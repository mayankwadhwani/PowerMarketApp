<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Organization;
use App\Account;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'organization' => ['nullable', 'string', 'unique:organizations,name']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (isset($data['organization'])) {
            $organization = Organization::create([
                'name' => $data['organization']
            ]);
            $default_account = Account::where('name', Controller::DEFAULT_ACCOUNT)->first();
            $organization->accounts()->attach($default_account);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role_id' => User::ORG_ADMIN,
            'password' => Hash::make($data['password']),
            'organization_id' => isset($organization) ? $organization->id : null
        ]);
    }
}
