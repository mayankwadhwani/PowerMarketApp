<?php
namespace App\Services\MonitoringVendorConnectors;

use App\GeopointOrganizationVendor;
use App\MonitoringData;
use Carbon\Carbon;
use GuzzleHttp\Client;

class SolarEdge {
    private $authData;
    private $url = "https://monitoringapi.solaredge.com";
    private $geopointOrganizationVendor;

    public function __construct(GeopointOrganizationVendor $geoPointOrganisationVendor, array $authData, array $geopointAdditionalMappingData=[])
    {
        $this->authData = $authData;
        $this->geopointOrganizationVendor = $geoPointOrganisationVendor;
    }

    private function getResponse(String $path, array $uriArr=[]): ?object
    {
        $uriArr['api_key'] = $this->authData['api_key'];
        $uriArr['format'] = 'json';
        $full_path = $this->url.$path;

        $client = new Client();
        $request = $client->get($full_path, [
            'query' => $uriArr,
            'headers'         => [],
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
            'timeout'         => 5,
            'connect_timeout' => 5,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($status === 200 && !empty($response)) {
            return (object) json_decode($response);
        }

        return null;
    }

    private function getSiteDetails($siteId): ?object
    {
        return $this->getResponse('/site/'.$siteId.'/details');
    }

    private function getSiteDataPeriod($siteId): ?object
    {
        return $this->getResponse('/site/'.$siteId.'/dataPeriod');
    }

    private function getMonitoringData($siteId, $startDate, $endDate): ?object
    {
        return $this->getResponse('/site/'.$siteId.'/energy', [
            'timeUnit' => 'QUARTER_OF_AN_HOUR',
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }

    public function pullData($startDate=null, $endDate=null): ?array
    {
        $data = [];

        // if start & end date are empty => we assume it's an initial pull
        if (empty($startDate) && empty($endDate)) {

            // get site installation date
            $datePeriod = $this->getSiteDataPeriod($this->geopointOrganizationVendor->site_id);
            if (!empty($datePeriod) && isset($datePeriod->dataPeriod)) {
                $startDate = \Carbon\Carbon::parse($datePeriod->dataPeriod->startDate);
                $endDate = \Carbon\Carbon::parse($datePeriod->dataPeriod->endDate);
            } else {
                $startDate = Carbon::today()->subYears(5);
                $endDate = Carbon::today();
            }

            // loop through all months and pull data
            foreach (\Carbon\CarbonPeriod::create($startDate, '1 month', $endDate) as $month) {

                $pulledData = $this->getMonitoringData(
                    $this->geopointOrganizationVendor->site_id,
                    $month->startOfMonth()->format('Y-m-d'),
                    $month->endOfMonth()->format('Y-m-d')
                );

                sleep(1); // prevent overload

                if (!empty($pulledData) && isset($pulledData->energy)) {
                    $data = array_merge($data, $pulledData->energy->values);
                }

            }

        } else {
            $pulledData = $this->getMonitoringData(
                $this->geopointOrganizationVendor->site_id,
                // SolarEdge supports only date as input
                \Carbon\Carbon::parse($startDate)->format('Y-m-d'),
                \Carbon\Carbon::parse($endDate)->format('Y-m-d')
            );

            if (!empty($pulledData) && isset($pulledData->energy)) {
                $data = array_merge($data, $pulledData->energy->values);
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
            if (empty($item->value)) continue;

            $now = \Carbon\Carbon::now();
            array_push($return, [
                'geopoint_id' => $this->geopointOrganizationVendor->geopoint_id,
                'organization_vendor_id' => $this->geopointOrganizationVendor->organization_vendor_id,
                'energy_generated_wh' => floatval($item->value),
                'range_start' => $item->date,
                'range_end' => \Carbon\Carbon::parse($item->date)->addMinutes(15)->toDateTimeString(),
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
