<?php

namespace App\Jobs;

use App\GeopointOrganizationVendor;
use App\Services\MonitoringVendorService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class PullMonitoringData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $geopoint_organization_vendors;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($geopoint_organization_vendors=null)
    {
        $this->geopoint_organization_vendors = $geopoint_organization_vendors;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('memory_limit',-1);
        if (empty($this->geopoint_organization_vendors)) {
            $this->geopoint_organization_vendors = GeopointOrganizationVendor::all();
        }

        $monitoringService = new MonitoringVendorService($this->geopoint_organization_vendors);
        $monitoringService->pullData();
    }
}
