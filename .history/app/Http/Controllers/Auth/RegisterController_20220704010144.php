<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Monarobase\CountryList\CountryListFacade;
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
        $channelUserId = 'UM' . mt_rand(1000000, 9999999); // better than rand()
        $countries = CountryListFacade::getList('en', 'php');

        $user =  DB::table('users')->insert([
                    'channel_user_id' => $channelUserId,
                    'first_name' => $request->name,
                    'id_type' => $request->id_type,
                    'id_no' => $request->id_no,
                    'email' => $request->email,
                    'dob' => Carbon::parse($request->dob)->format('M d Y'),
                    'nationality' => $request->nationality,
                    'mobile_number' => $request->phone,
                    'password' =>Hash::make($request->password),
                    'role_id' => 2,
                    'status' => 1
                ]);
        if($user) {
            return view('auth.login');
        }
        else {
            return view('auth.register', ['countries' => $countries]);
        }


    }
}
