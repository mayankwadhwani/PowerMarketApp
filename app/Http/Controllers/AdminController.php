<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function test(Request $request)
    {
        return view('pages.admin_dashboard');
    }
}
