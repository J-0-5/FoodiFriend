<?php

namespace App\Http\Controllers\Auth;

use App\Commerce;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'lastName' => ['required', 'string', 'max:255'],
            'docType' => ['required', 'exists:parameter_value,id'],
            'numDoc' => ['required', 'unique:users,numDoc'],
            'city' => ['required', 'exists:city,id'],
            'address' => ['required', 'string', 'max:255'],
            /////////////////////////////////////////////////////////////////////
            'nit' => ['nullable', 'unique:commerce,nit'],
            'commerceName' => ['nullable', 'string', 'max:255'],
            'commerceType' => ['nullable', 'exists:commerce_type,id'],
            'description' => ['nullable', 'string', 'max:255'],
            /////////////////////////////////////////////////////////////////////
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        $user = User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'],
            'docType' => $data['docType'],
            'numDoc' => $data['numDoc'],
            'city_id' => $data['city'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if (!empty($data['nit'])) {
            Commerce::create([
                'nit' => $data['nit'],
                'user_id' => $user->id,
                'name' => $data['commerceName'],
                'type' => $data['commerceType'],
                'description' => $data['description'],
            ]);
        }
        return $user;
    }
}
