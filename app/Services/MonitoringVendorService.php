<?php

namespace App\Services;

use App\Geopoint;
use App\MonitoringData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class MonitoringVendorService
{
    protected $geoPointOrganisationVendors;

    public function __construct(Collection $geoPointOrganisationVendors)
    {
        $this->geoPointOrganisationVendors = $geoPointOrganisationVendors;
    }

    public function pullData()
    {
        foreach ($this->geoPointOrganisationVendors as $geoPointOrganisationVendor) {

            $organisationVendor = $geoPointOrganisationVendor->organization_vendor;
            $vendor = $geoPointOrganisationVendor->organization_vendor->vendor()->first();

            $vendorClass = '\App\Services\MonitoringVendorConnectors\\'.$vendor->name;
            if (class_exists($vendorClass)) {
                $vendorClass = new $vendorClass(
                    $geoPointOrganisationVendor,
                    $organisationVendor->auth_data,
                    ($geoPointOrganisationVendor->additional_mapping_data ? json_decode($geoPointOrganisationVendor->additional_mapping_data, true) : [])
                );

                $startDate = null;
                $endDate = null;
                if (!empty($organisationVendor->last_run)) {
                    $startDate = $organisationVendor->last_run;
                    $endDate = \Carbon\Carbon::now();
                }

                if ($vendorClass->pullData($startDate, $endDate)) {
                    $organisationVendor->update(['last_run' => \Carbon\Carbon::now()]);
                }
            } else {
                Log::error('Class '.$vendorClass.' doesn\'t exists');
            }
        }
    }

}
