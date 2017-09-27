<?php

namespace App\Http\Controllers\Auth;

use App\Core\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
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
    protected $redirectTo = '/profile/edit';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'             => 'required|string|max:255',
            'email'            => 'required|string|email|max:255|unique:users',
            'password'         => 'required|string|min:6|confirmed',
            'phone'            => 'sometimes|max:255',
            'address'          => 'sometimes|required|max:255',
            'inn'              => 'sometimes|required|max:12',
            'ogrn'             => 'sometimes|required|max:15',
            'website'          => 'sometimes|max:255',
            'type_of_activity' => 'sometimes|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'        => $data['name'],
            'email'       => $data['email'],
            'password'    => bcrypt($data['password']),
            'permissions' => [],
            'phone'       => $data['phone'],
            'address'     => $data['address'],
            'inn'         => $data['inn'],
            'ogrn'        => $data['ogrn'],
            'website'     => $data['website'],
            'agent_name'  => $data['agent_name'],
            'avatar'      => '/img/avatar.png',
            'options'     => [],
        ]);
    }
}
