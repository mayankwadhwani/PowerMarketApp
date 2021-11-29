<?php
namespace App\Services\MonitoringVendorConnectors;

use App\GeopointOrganizationVendor;
use GuzzleHttp\Client;

class SolarEdge {
    private $authData;
    private $url = "https://monitoringapi.solaredge.com/";
    private $geopointOrganizationVendor;

    public function __construct(GeopointOrganizationVendor $geoPointOrganisationVendor, array $authData)
    {
        $this->authData = $authData;
        $this->geopointOrganizationVendor = $geoPointOrganisationVendor;
    }

    private function getResponse($siteId, $startDate=null, $endDate=null): ?object
    {
        if (empty($startDate)) {
            $startDate = \Carbon\Carbon::now()->subMonths(1)->format('Y-m-d');
        }
        if (empty($endDate)) {
            $endDate = \Carbon\Carbon::now()->format('Y-m-d');
        }
        // https://monitoringapi.solaredge.com/site/252067/energy?timeUnit=QUARTER_OF_AN_HOUR&endDate=2020-10-31&startDate=2020-10-01&api_key=2A74C01WSSM7UVMIUXCUN9L62HK59M57&format=json
        $full_path = $this->url.'site/'.$siteId.'/energy?timeUnit=QUARTER_OF_AN_HOUR&endDate='.$endDate.'&startDate='.$startDate.'&api_key='.$this->authData['api_key'].'&format=json';

        $client = new Client();
        $request = $client->get($full_path, [
            'headers'         => [],
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return (object) json_decode($response);
        }

        return null;
    }

    public function pullData($startDate=null, $endDate=null): ?array
    {
        $data = $this->getResponse($this->geopointOrganizationVendor->site_id, $startDate, $endDate);
        if (!empty($data) && isset($data->energy) && !empty($data->energy->values)) {
            return $this->formatData($data->energy->values);
        }

        return null;
    }

    private function formatData(array $data): array
    {
        $return = [];
        foreach ($data as $item) {
            if (empty($item->value)) continue;

            array_push($return, [
                'geopoint_id' => $this->geopointOrganizationVendor->geopoint_id,
                'organization_vendor_id' => $this->geopointOrganizationVendor->organization_vendor_id,
                'energy_generated_wh' => floatval($item->value),
                'range_start' => $item->date,
                'range_end' => \Carbon\Carbon::parse($item->date)->addMinutes(15)->toDateTimeString(),
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }

        return $return;
    }
}
