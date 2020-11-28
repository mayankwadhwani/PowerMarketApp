<?php

namespace App\Http\Controllers;

use App\Geopoint;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}");
        }

        return abort(404);
    }

    /**
     * Display the reporting page
     *
     * @return \Illuminate\View\View
     */
    public function reporting(Request $request)
    {
        $geopoint = Geopoint::find($request->geopoint_id);
        if (is_null($geopoint)) {
            return view('pages.reporting');
        }
        $lat = $geopoint->latLon->getLat();
        $lon = $geopoint->latLon->getLng();
        $key = config('services.google_maps.key');
        try {
            $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json?latlng=' . $lat . ',' . $lon . '&key=' . $key . '&result_type=street_address');
            $address = $response['results'][0]['formatted_address'];
        } catch (\Exception $e) {
            $address = null;
        }
        return view('pages.reporting', [
            'size' => $geopoint->system_capacity_kWp,
            'cost' => $geopoint->system_cost_GBP,
            'savings' => $geopoint->lifetime_gen_GBP,
            'breakeven' => $geopoint->breakeven_years,
            'lat' => $lat,
            'lon' => $lon,
            'address' => $address,
            'geodata' => json_encode([$geopoint])
        ]);
    }

    /**
     * Display the privacy page
     *
     * @return \Illuminate\View\View
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * Display the pricing page
     *
     * @return \Illuminate\View\View
     */
    public function pricing()
    {
        return view('pages.pricing');
    }

    /**
     * Display the lock page
     *
     * @return \Illuminate\View\View
     */
    public function lock()
    {
        return view('pages.lock');
    }


    public function admin()
    {
        return view('pages.admin_dashboard');
    }
}
