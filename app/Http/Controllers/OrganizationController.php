<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Account;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organizations.index', ['organizations' => Organization::all()]);
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
            'name' => $request->name
        ]);
        $organization->accounts()->attach($request->accounts);
        return redirect()->route('organization.index')->withStatus(__('Organization successfully created.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
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
        $organization->accounts()->sync($request->accounts);
        return redirect()->route('organization.index')->withStatus(__('Organization successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organization.index')->withStatus(__('Organization successfully deleted.'));
    }
}
