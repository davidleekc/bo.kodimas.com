<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

use Monarobase\CountryList\CountryListFacade;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
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

    public function create()
    {
        $countries = CountryListFacade::getList('en', 'php');

        return view('auth.register', ['countries' => $countries]);
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
            'id_type' => ['required', 'string', 'max:1'],
            'id_no'  => ['required', 'string', 'max:50'],
            'nationality' => ['required', 'string', 'max:2'],
            'dob' => ['date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function store(Request $request)
    {
        $channelUserId = UniqueIdGenerator::generate(['table' => 'users', 'length' => 7, 'prefix' => 'UM']);

        $user =  DB::insert('INSERT INTO users (
                                channel_user_id,
                                first_name,
                                last_name,
                                id_type,
                                id_no,
                                email,
                                dob,
                                nationality,
                                mobile_number,
                                password,
                                role_id,
                                status
                            ) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )', [
                                $channelUserId,
                                $request->name,
                                null,
                                $request->id_type,
                                $request->id_no,
                                $request->email,
                                Carbon::createFromFormat('Y/m/d', $request->dob)->format('Y-m-d'),
                                $request->nationality,
                                $request->phone,
                                Hash::make($request->password),
                                2,
                                1
                            ]);

        print_r($user);
        //return redirect(RouteServiceProvider::HOME);
    }
}
