<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;

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
    protected $redirectTo = '/login';

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cv' => ['required','mimes:jpeg,jpg,png','max:1000'],
            'owner_name' => ['required', 'string', 'max:255'],
            'owner_email' => ['required', 'string', 'max:255'],
            'owner_phone' => ['required', 'string', 'max:255'],
            'owner_address' => ['required', 'string', 'max:255'],
            'ktp_number' => ['required', 'string', 'max:255'],
            'owner_ktp' => ['required','mimes:jpeg,jpg,png','max:1000'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $file = $data['cv'];
        $imagedata = file_get_contents($file->getRealPath());
        $base64Cv = base64_encode($imagedata);
      
        $file = $data['owner_ktp'];
        $imagedata = file_get_contents($file->getRealPath());
        $base64ktp = base64_encode($imagedata);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'status' => 'delay',
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'cv' =>  $base64Cv,
            'owner_name' => $data['owner_name'],
            'owner_email' => $data['owner_email'],
            'owner_phone' => $data['owner_phone'],
            'owner_address' => $data['owner_address'],
            'ktp_number' => $data['ktp_number'],
            'ktp' =>  $base64ktp,
        ]);
    }
}
