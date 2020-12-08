<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accounts.index', ['accounts' => Account::all()]);
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', ['account' => $account]);
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
            'name' => 'required',
            'lat' => 'required|numeric|min:-90|max:90',
            'lon' => 'required|numeric|min:-180|max:180'
        ]);
        Account::create([
            'name' => $request->name,
            'lat' => $request->lat,
            'lon' => $request->lon
        ]);
        return redirect()->route('account.index')->withStatus(__('Account successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        $request->validate([
            'lat' => 'nullable|numeric|min:-90|max:90',
            'lon' => 'nullable|numeric|min:-180|max:180'
        ]);
        if($request->filled('name')){
            $account->name = $request->name;
        }
        if($request->filled('lat')){
            $account->lat = $request->lat;
        }
        if($request->filled('lon')){
            $account->lon = $request->lon;
        }
        $account->save();
        return redirect()->route('account.index')->withStatus(__('Account successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('account.index')->withStatus(__('Account successfully deleted.'));
    }
}
