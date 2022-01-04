<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Account;

use App\OrganizationVendor;
use App\Vendor;
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
        $user = auth()->user();
        return view('organization_vendors.create', [
            'organisations' => Organization::all(),
            'vendors' => Vendor::all(),
            'user_is_admin' => $user->isAdmin()
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
        $request->validate([
            'organisation_id' => 'sometimes|numeric',
            'vendor_id' => 'required|numeric',
            'active' => 'sometimes|in:1,0'
        ]);

        $authData = $this->processAuthDataFields($request);

        $user = auth()->user();
        $organizationId = $user->organization->id;
        if ($user->isAdmin()) {
            $organizationId = $request->get('organisation_id');
        }

        OrganizationVendor::create([
            'organisation_id' => $organizationId,
            'vendor_id' => $request->get('vendor_id'),
            'active' => $request->get('active') ?? 0,
            'auth_data' => $authData
        ]);

        return redirect()->route('organization_vendor.index')->withStatus(__('Vendor successfully added.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrganizationVendor  $organizationVendor
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationVendor $organizationVendor)
    {
        $organizationVendor->load('organization')->load('vendor');

        return view('organization_vendors.edit', [
            'organization_vendor' => $organizationVendor,
            'organisations' => Organization::all(),
            'vendors' => Vendor::all(),
            'user_is_admin' => auth()->user()->isAdmin()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrganizationVendor $organizationVendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationVendor $organizationVendor)
    {
        $request->validate([
            'organisation_id' => 'sometimes|numeric',
            'vendor_id' => 'required|numeric',
            'active' => 'sometimes|in:1,0'
        ]);

        $user = auth()->user();
        if (!$user->isAdmin()) {
            $request->request->remove('organisation_id');
        }

        if (!$request->has('active')) {
            $request->merge(['active' => 0]);
        }

        $request->merge(['auth_data' => $this->processAuthDataFields($request)]);

        $organizationVendor->update($request->only(['organisation_id', 'vendor_id', 'auth_data', 'active']));

        return redirect()->route('organization_vendor.index')->withStatus(__('Vendor successfully updated.'));
    }

    private function processAuthDataFields(Request $request): array
    {
        $vendorAuthData = Vendor::find($request->get('vendor_id'))->auth_data;
        $authData = [];
        if (!empty($vendorAuthData)) {
            $validation = [];
            foreach($vendorAuthData as $field) {
                $validation[$field['name']] = 'required';
            }
            $request->validate($validation);

            foreach($vendorAuthData as $field) {
                $authData[$field['name']] = $request->get($field['name']);
            }
        }

        return $authData;
    }

}
