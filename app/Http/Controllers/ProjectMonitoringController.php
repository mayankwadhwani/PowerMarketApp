<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\Geopoint;
use App\Services\DatatableSourceResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProjectMonitoringController extends Controller
{
    //
    public function monitoring_dashboard($cluster_name)
    {
        $user = auth()->user();
        $cluster = Cluster::where('user_id', $user->id)->where('name', $cluster_name)->first();
        abort_if(empty($cluster), 404);

//        $geopoints = $cluster->geopoints;

        $mapData = $cluster->geopoints()->get([
            'id', 'latLon',
            'breakeven_years', 'system_capacity_kWp',
            'system_cost_GBP', 'lifetime_gen_GBP',
            'lifetime_co2_saved_kg', 'irr_discounted_percent',
            'lifetime_return_on_investment_percent', 'existingsolar',
            'numpanels', 'area_sqm'
        ]);
        return view('pages.dashboard_monitoring', [
            'mapData' => $mapData,
            'cluster' => $cluster->name,
            'cluster_id' => $cluster->id,
            'orgdata' => $user->organization->toArray(),
            'geopoint_organization_vendors' => $user->organization->vendors()
                ->with('geopoint_organization_vendors')->get()->pluck('geopoint_organization_vendors')->collapse()->toArray(),

            'sites_count' => $cluster->geopoints()->count(),
            'total_co2' => 1,
            'total_generation' => 1,
            'total_capacity' => 1,
        ]);
    }

    public function monitoring_geopoint($cluster_name, Geopoint $geopoint)
    {
        $user = auth()->user();
        $cluster = Cluster::where('user_id', $user->id)->where('name', $cluster_name)->first();
        abort_if(empty($cluster), 404);
        $geopoint->load(['geopoint_organization_vendor']);

        $lat = $geopoint->latLon->getLat();
        $lon = $geopoint->latLon->getLng();
        $key = config('services.google_maps.key');
        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon . '&key=' . $key);
            $address = $response['results'][0]['formatted_address'];
        } catch (\Exception $e) {
            $address = $geopoint->address;
        }

        return view('pages.dashboard_monitoring_geopoint', [
            'geopoint' => $geopoint->toArray(),
            'cluster' => $cluster->name,
            'cluster_id' => $cluster->id,
            'orgdata' => $user->organization->toArray(),
            'size' => $geopoint->system_capacity_kWp,
            'cost' => $geopoint->system_cost_GBP,
            'savings' => $geopoint->lifetime_gen_GBP,
            'breakeven' => $geopoint->breakeven_years,
            'tons' => round($geopoint->annual_co2_saved_kg / 1000, 2),
            'cars' => round($geopoint->annual_gen_kWh * 0.00025, 2),
            'trees' => round($geopoint->annual_gen_kWh * 0.0117),
            'oil' => round($geopoint->annual_gen_kWh * 0.2174),
            'lat' => $lat,
            'lon' => $lon,
            'address' => $address,

            'sites_count' => $cluster->geopoints()->count(),
            'total_co2' => 1,
            'total_generation' => 1,
            'total_capacity' => 1,
//            'currentDBParams' => $currentDBParams
        ]);
    }

    public function project_sites(Request $request, Cluster $cluster)
    {
        return (new DatatableSourceResult($request, $cluster->geopoints()->with('geopoint_organization_vendor')))->response();
    }

    public function geopoint(Cluster $cluster, Geopoint $geopoint)
    {
        $user = auth()->user();
        abort_if($cluster->user_id !== $user->id, 403);
        abort_if(in_array($cluster->id, $geopoint->clusters()->pluck('id')->toArray()), 403);
        return response()->json(['data' => $geopoint]);
    }
}
