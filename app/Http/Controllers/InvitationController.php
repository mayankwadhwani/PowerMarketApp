<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\Mail\InvitationMail;
use App\Jobs\SendInvitation;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:invitations,id',
            'token' => 'required|string'
        ]);
        $invitation = Invitation::find($request->id);
        if($invitation->token != $request->token){
            return abort(419);
        }
        return view('auth.register')->with([
            'name' => $invitation->name,
            'email' => $invitation->email,
            'organization' => optional($invitation->user->organization)->name,
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'is_admin' => 'nullable|boolean',
            'accounts' => 'required|array|min:1'
        ]);
        $user = auth()->user();
        if (!$user->isOrgAdmin() && !$user->isAdmin()) {
            return abort(404);
        }
        $token = Str::random(30);
        $invitation = Invitation::where('email', $request->email)->first();
        if ($invitation) {
            $invitation->update([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->filled('is_admin') ? true : false,
                'user_id' => $user->id,
                'organization_id' => optional($user->organization)->id,
                'token' => $token
            ]);
        } else {
            $invitation = Invitation::create([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => $request->filled('is_admin') ? true : false,
                'user_id' => $user->id,
                'organization_id' => optional($user->organization)->id,
                'token' => $token
            ]);
        }
        $invitation->accounts()->sync($request->accounts);
        Mail::to($invitation->email)->queue(new InvitationMail(
            $invitation->id,
            $token,
            $user->name,
            optional($user->organization)->name
        ));
        return redirect()->route('home')->withStatus(
            'The invitation has been successfully sent!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
