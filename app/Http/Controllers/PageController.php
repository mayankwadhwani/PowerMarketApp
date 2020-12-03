<?php

namespace App\Http\Controllers;

use App\Geopoint;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

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

    public function pdf(Request $request)
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
        $html = view('pages.pdf', [
            'size' => $geopoint->system_capacity_kWp,
            'cost' => $geopoint->system_cost_GBP,
            'savings' => $geopoint->lifetime_gen_GBP,
            'breakeven' => $geopoint->breakeven_years,
            'tons' => round($geopoint->annual_co2_saved_kg / 1000, 2),
            'cars' => round($geopoint->annual_gen_kWh * 0.0001275, 2),
            'trees' => round($geopoint->annual_gen_kWh * 0.0117, 2),
            'oil' => round($geopoint->annual_gen_kWh * 0.0123, 2),
            'lat' => $lat,
            'lon' => $lon,
            'address' => $address,
            'geodata' => json_encode([$geopoint])
        ]);
        if ($request->input('download') == true) {
            $output = [];
            $command = 'node generate_pdf.js 1';
            exec($command, $output);
            $report = $output[0];
            return response()->stream(function () use ($report) {
                echo base64_decode($report);
            }, 200, [
                'Content-Type' => 'application/pdf',
            ]);
        // $process = new Process(['node', 'generate_pdf.js']);
        // $process->run(null, ['PATH' => 'C:\\Program Files\\nodejs']);
        // if (!$process->isSuccessful()) {
        //     return $process->getErrorOutput();
        // }

        // return $process->getOutput();
        }
        return $html;
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
            'tons' => round($geopoint->annual_co2_saved_kg / 1000, 2),
            'cars' => round($geopoint->annual_gen_kWh * 0.0001275, 2),
            'trees' => round($geopoint->annual_gen_kWh * 0.0117, 2),
            'oil' => round($geopoint->annual_gen_kWh * 0.0123, 2),
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
