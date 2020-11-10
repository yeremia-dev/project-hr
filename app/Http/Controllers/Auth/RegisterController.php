<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Karyawan;
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
        return Validator::make($data,
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'nrp' => ['required', 'string'],
                'status' => ['required', 'string'],
                'jabatan' => ['required', 'string'],
                'section' => ['required', 'string'],
                'departemen' => ['required', 'string'],
                'nama_nrp_atasan' => ['required', 'string'],
                'no_hp' => ['required', 'string'],
            ],
            [
                'email.unique' => 'Email sudah digunakan,',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'status.required' => 'Pilih status',
                'password.min' => 'Password minimal 8 digit',

            ]
        );
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Karyawan::create([
            'user_id' => $user->id,
            'nrp' => $data['nrp'],
            'nama_lengkap' => $data['name'],
            'status' => $data['status'],
            'jabatan' => $data['jabatan'],
            'section' => $data['section'],
            'departemen' => $data['departemen'],
            'nama_nrp_atasan' => $data['nama_nrp_atasan'],
            'email' => $data['email'],
            'no_hp' => $data['no_hp']
        ]);

        return $user;
    }
}
