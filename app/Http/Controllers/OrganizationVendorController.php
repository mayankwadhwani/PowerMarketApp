<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Account;

use App\OrganizationVendor;
use Illuminate\Http\Request;

class OrganizationVendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->isAdmin()) {
            $organisations = OrganizationVendor::query();
        } else {
            $organisations = OrganizationVendor::where('organisation_id', $user->organization->id);
        }

        $organisations = $organisations->with('organization')->with('vendor')->get();
        return view('organization_vendors.index', [
            'organization_vendors' => $organisations,
            'user_is_admin' =>$user->isAdmin()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizations.create', [
            'accounts' => Account::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organization = Organization::create([
            'name' => $request->name,
            'system_cost' => $request->system_cost,
            'system_size' => $request->system_size,
            'captiveuse' => $request->captiveuse,
            'exporttariff' => $request->exporttariff,
            'residentialtariff' => $request->residentialtariff,
            'nonresidentialtariff' => $request->nonresidentialtariff,
            'currencysymbol' => $request->currencysymbol
        ]);
        $organization->accounts()->attach($request->accounts);
        return redirect()->route('organization.index')->withStatus(__('Organization successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganizationVendor  $organizationVendor
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationVendor $organizationVendor)
    {dd($organizationVendor);
        return view(
            'organizations.edit',
            [
                'organization' => $organization,
                'accounts' => Account::all()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        if ($request->filled('name')) {
            $organization->name = $request->name;
        }
        if ($request->filled('system_cost')) {
            $organization->system_cost = $request->system_cost;
        }
        if ($request->filled('system_size')) {
            $organization->system_size = $request->system_size;
        }
        if ($request->filled('captiveuse')) {
            $organization->captiveuse = $request->captiveuse;
        }
        if ($request->filled('exporttariff')) {
            $organization->exporttariff = $request->exporttariff;
        }
        if ($request->filled('residentialtariff')) {
            $organization->residentialtariff = $request->residentialtariff;
        }
        if ($request->filled('nonresidentialtariff')) {
            $organization->nonresidentialtariff = $request->nonresidentialtariff;
        }
        if ($request->filled('currencysymbol')) {
            $organization->currencysymbol = $request->currencysymbol;
        }


        $organization->save();

        $organization->accounts()->sync($request->accounts);
        return redirect()->route('organization.index')->withStatus(__('Organization successfully updated.'));
    }

}
