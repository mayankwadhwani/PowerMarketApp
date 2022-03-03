<?php
namespace App\Services\MonitoringVendorConnectors;

use App\GeopointOrganizationVendor;
use App\MonitoringData;
use Carbon\Carbon;
use GuzzleHttp\Client;

class ShineMonitor {
    private $authData;
    private $url = "http://web.shinemonitor.com/public/";
    private $geopointOrganizationVendor;
    private $geopointAdditionalMappingData;

    private $secret;
    private $token;
    private $salt;
    private $expires;

    public function __construct(GeopointOrganizationVendor $geoPointOrganisationVendor, array $authData, array $geopointAdditionalMappingData=[])
    {
        $this->authData = $authData;
        $this->geopointOrganizationVendor = $geoPointOrganisationVendor;
        $this->geopointAdditionalMappingData = $geopointAdditionalMappingData;
    }

    private function getToken()
    {
        $this->salt = $salt = intval(microtime(true) * 1000);
        $powSha1 = sha1(utf8_encode($this->authData['password']));

        $action = '&action=auth&usr='.$this->authData['username'].'&company-key='.$this->authData['company_key'];
        $pwdaction = $salt.$powSha1.$action;

        $sign = sha1(utf8_encode($pwdaction));

        $query = [
            'sign' => $sign,
            'salt' => $salt,
            'action' => 'auth',
            'usr' => $this->authData['username'],
            'company-key' => $this->authData['company_key']
        ];

        $client = new Client();
        $request = $client->get($this->url, [
            'query' => $query,
            'headers'         => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36',
                'Referer' => $this->url,
            ],
            'http_errors'     => true,
            'timeout'         => 35,
            'connect_timeout' => 35,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($status === 200 && !empty($response)) {
            return (object) json_decode($response);
        }

        return null;
    }

    private function getResponse(String $path="", array $uriArr=[]): ?object
    {
        if (empty($this->secret) || empty($this->token) || \Carbon\Carbon::parse($this->expires)->isPast()) {
            $auth = $this->getToken();
            if ($auth && $auth->err == 0) {
                $this->secret = $auth->dat->secret;
                $this->token = $auth->dat->token;
                $this->expires = \Carbon\Carbon::now()->addSeconds($auth->dat->expire);
                sleep(2);
            } else {
                 throw new \Exception('Auth failed');
            }
        }

        $this->salt = intval(microtime(true) * 1000);
        $sign = sha1($this->salt.$this->secret.$this->token.'&'.http_build_query($uriArr));

        // ShineMonitor requires URI params to be in exactly same order as they use it
        // otherwise it will be wrong sign error
        $requestUri = 'sign='.$sign.'&salt='.$this->salt.'&token='.$this->token.'&'.http_build_query($uriArr);
        $full_path = $this->url.$path;

        $client = new Client();
        $request = $client->get($full_path, [
            'query' => $requestUri,
            'headers'         => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.81 Safari/537.36',
                'Referer' => $this->url,
            ],
            'http_errors'     => true,
            'timeout'         => 35,
            'connect_timeout' => 35,
            'on_stats' => function (\GuzzleHttp\TransferStats $stats) use (&$url) {
                $url = $stats->getEffectiveUri();
            }
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($status === 200 && !empty($response)) {
            $decoded = json_decode($response);
            if (!isset($decoded->err) || $decoded->err != 0) {
                return null;
            }
            return (object) json_decode($response)->dat;
        }

        return null;
    }

    private function getSiteDetails($siteId): ?object
    {
        return $this->getResponse('', [
            'action' => 'queryPlantInfo',
            'plantid' => $siteId
        ]);
    }

    private function getMonitoringData($siteId, $startDate): ?object
    {
        return $this->getResponse('', [
            'action' => 'queryPlantActiveOuputPowerOneDay',
            'plantid' => $siteId,
            'date' => $startDate,
            'i18n' => 'en_US',
            'lang' => 'en_US'
        ]);
    }

    public function pullData($startDate=null, $endDate=null): ?array
    {
        $data = [];

        // if start & end date are empty => we assume it's an initial pull
        if (empty($startDate) && empty($endDate)) {

            // get site installation date
            $siteDetails = $this->getSiteDetails($this->geopointOrganizationVendor->site_id);

            if (!empty($siteDetails) && isset($siteDetails->install)) {
                $startDate = \Carbon\Carbon::parse($siteDetails->install);
                $endDate = Carbon::today();
            } else {
                $startDate = Carbon::today()->subYears(5);
                $endDate = Carbon::today();
            }

            // loop through all days and pull data
            foreach (\Carbon\CarbonPeriod::create($startDate, '1 day', $endDate) as $day) {

                $pulledData = $this->getMonitoringData(
                    $this->geopointOrganizationVendor->site_id,
                    $day->format('Y-m-d')
                );

                sleep(1); // prevent overload

                if (!empty($pulledData) && isset($pulledData->outputPower)) {
                    $data = array_merge($data, $pulledData->outputPower);
                }
            }

        } else {
            $pulledData = $this->getMonitoringData(
                $this->geopointOrganizationVendor->site_id,
                \Carbon\Carbon::parse($startDate)->format('Y-m-d')
            );

            if (!empty($pulledData) && isset($pulledData->outputPower)) {
                $data = array_merge($data, $pulledData->outputPower);
            }
        }

        if (!empty($data)) {
            return $this->formatData($data);
        }

        return null;
    }

    private function formatData(array $data): array
    {
        $return = [];

        foreach ($data as $item) {
            if (empty($item->val) || $item->val === "0.0000") continue;

            $now = \Carbon\Carbon::now();
            array_push($return, [
                'geopoint_id' => $this->geopointOrganizationVendor->geopoint_id,
                'organization_vendor_id' => $this->geopointOrganizationVendor->organization_vendor_id,
                'energy_generated_wh' => floatval($item->val),
                'range_start' => $item->ts,
                'range_end' => \Carbon\Carbon::parse($item->ts)->addMinutes(10)->toDateTimeString(),
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            if (count($return) === 500) {
                MonitoringData::insertOrIgnore($return);
                $return = [];
            }
        }

        MonitoringData::insertOrIgnore($return);
        return $return;
    }
}
