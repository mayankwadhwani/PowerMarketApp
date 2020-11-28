<?php

namespace App\Http\Controllers;

use App\Region;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $gloucester = Region::where('name', 'Gloucester')->first();
        return view('pages.dashboard', ['geodata' => optional($gloucester)->geopoints]);
    }
}
