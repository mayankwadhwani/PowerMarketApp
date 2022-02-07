<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\GeopointOrganizationVendor;
use App\Jobs\PullMonitoringData;
use App\MonitoringData;
use App\OrganizationVendor;
use \Carbon\Carbon;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{

    public function getData(Request $request, GeopointOrganizationVendor $geoPointOrganizationVendor)
    {
        $request->validate([
            'date_start' => 'required|date|date_format:Y-m-d|before:date_end',
            'date_end' => 'required|date|date_format:Y-m-d|after:date_start'
        ]);

        $user = auth()->user();
        if ($geoPointOrganizationVendor->organization_vendor->organisation_id != $user->organization->id) {
            return response()->json('', 403);
        }

        $dateStart = Carbon::parse($request->get('date_start'));
        $dateEnd = Carbon::parse($request->get('date_end'));

        $response = [];
        $data = MonitoringData::where([
            'geopoint_id' => $geoPointOrganizationVendor->geopoint_id,
            'organization_vendor_id' => $geoPointOrganizationVendor->organization_vendor->id
        ])
            ->where(function ($query) use ($dateStart, $dateEnd) {
                $query->whereBetween('range_start', [$dateStart->startOfDay(), $dateEnd->endOfDay()])
                    ->orWhereBetween('range_end', [$dateStart->startOfDay(), $dateEnd->endOfDay()]);
            })
            ->get();

        if (empty($data)) {
            return $response;
        }

        // If I select a day or a week, x-axis is 15min intervals - so up to 7*24*4 = 672 data points plotted as a line plot.
        // If I select month, x-axis becomes days 1st, 2nd, 3rd, 4th, etc., with entries every day (daily output sum) - 30ish entries.
        // If I select year, x-axis becomes months jan, feb, march, etc., with entries every month (monthly output sum) - 12 entries.
        // If I select all, I see either a per-year comparison, or I get a plot where for each month of the year I get a bar for each year of data (this will get pretty wild when we get to 10+ years)

        $diffInDays = $dateStart->diffInDays($dateEnd);
        if ($diffInDays <= 7) {
            // selected day or a week -> 15min
            $format = "Y-m-d-H-i";
            $response = $this->generateDateRange($dateStart, $dateEnd, 'd-H-i', $format);

            foreach ($data as $value) {
                $response[$this->convertToHourQuarter($value->range_start)] += $value->energy_generated_wh;
            }

        } elseif ($diffInDays <= 31) {
            // selected month -> days
            $format = "Y-m-d";
            $response = $this->generateDateRange($dateStart, $dateEnd, 'd', $format);

            foreach ($data as $value) {
                $response[Carbon::parse($value->range_start)->format($format)] += $value->energy_generated_wh;
            }

        } else {
            // default month
            $format = "Y-m";
            $response = $this->generateDateRange($dateStart, $dateEnd, 'm', $format);

            foreach ($data as $value) {
                $response[Carbon::parse($value->range_start)->format($format)] += $value->energy_generated_wh;
            }
        }

        return $response;
    }

    public function getSumByProject(Request $request, Cluster $cluster)
    {
        $user = auth()->user();
        /** @var \App\Organization $org */
        $vendor = $cluster->geopoints()->whereHas('geopoint_organization_vendor')
            ->with('geopoint_organization_vendor')
            ->get()->pluck('geopoint_organization_vendor')
            ->collapse()->random();
        return $this->getData($request, $vendor);
    }

    private function generateDateRange(Carbon $date_start, Carbon $date_end, string $step = 'd', string $format = 'Y-m-d'): array
    {
        $dates = [];
        for ($date = $date_start->copy(); $date->lte($date_end); ($step === 'd' ? $date->addDay() : ($step === 'd-H-i' ? $date->addMinutes(15) : $date->addMonth()))) {
            $dates[$date->format($format)] = 0;
        }

        return $dates;
    }

    private function convertToHourQuarter(string $dateTime): string
    {
        $carbon = Carbon::parse($dateTime);
        if ($carbon->format('i') < 15) {
            $return = $carbon->format("Y-m-d-H-00");
        } elseif ($carbon->format('i') < 30) {
            $return = $carbon->format("Y-m-d-H-15");
        } elseif ($carbon->format('i') < 45) {
            $return = $carbon->format("Y-m-d-H-30");
        } else {
            $return = $carbon->format("Y-m-d-H-45");
        }

        return $return;
    }

    public function addGeoPointToVendor(Request $request)
    {
        $request->validate([
            'geopoint_id' => 'required|numeric|exists:geopoints,id',
            'organization_vendor_id' => 'required|numeric|exists:organization_vendors,id',
            'site_id' => 'required|between:1,255'
        ]);

        $user = auth()->user();
        $organizationVendor = OrganizationVendor::find($request->get('organization_vendor_id'));

        if ($organizationVendor->organisation_id != $user->organization->id) {
            return response()->json('', 403);
        }

        $recordExists = GeopointOrganizationVendor::where([
            ['geopoint_id', $request->get('geopoint_id')],
            ['organization_vendor_id', $request->get('organization_vendor_id')],
            ['site_id', $request->get('site_id')]
        ])->first();

        if (!empty($recordExists)) {
            return $recordExists;
        }

        $result = GeopointOrganizationVendor::create([
            'geopoint_id' => $request->get('geopoint_id'),
            'organization_vendor_id' => $request->get('organization_vendor_id'),
            'site_id' => $request->get('site_id')
        ]);

        if ($result) {
            $result = $result->fresh();
            PullMonitoringData::dispatch($result);
            return $result;
        }

        return response()->json('Something went wrong', 500);
    }


    public function updateGeoPointVendor(Request $request, GeopointOrganizationVendor $geoPointOrganizationVendor)
    {
        $request->validate([
            'site_id' => 'required|numeric',
        ]);

        $user = auth()->user();

        if ($geoPointOrganizationVendor->organization_vendor->organisation_id != $user->organization->id) {
            return response()->json('', 403);
        }

        $geoPointOrganizationVendor->update($request->only(['site_id']));

        return response()->json($geoPointOrganizationVendor);
    }


    public function removeGeoPointFromVendor(GeopointOrganizationVendor $geoPointOrganizationVendor)
    {
        $user = auth()->user();

        if ($geoPointOrganizationVendor->organization_vendor->organisation_id != $user->organization->id) {
            return response()->json('', 403);
        }

        MonitoringData::where([
            ['geopoint_id', $geoPointOrganizationVendor->geopoint_id],
            ['organization_vendor_id', $geoPointOrganizationVendor->organization_vendor->id]
        ])->delete();

        $geoPointOrganizationVendor->delete();

        return response()->json("", 204);
    }
}
