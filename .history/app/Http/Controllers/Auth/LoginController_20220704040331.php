<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function prepareTwoFactor(Request $request)
    {
        $secret = $request->user()->createTwoFactorAuth();

        return view('user.2fa', [
            'as_qr_code' => $secret->toQr(),     // As QR Code
            'as_uri'     => $secret->toUri(),    // As "otpauth://" URI.
            'as_string'  => $secret->toString(), // As a string
        ]);
    }

    public function confirmTwoFactor(Request $request)
    {
        if ($request->user()->confirmTwoFactorAuth($request->code)) {
            return $request->user()->getRecoveryCodes();
        } else {
            return 'Try again!';
        }
    }

    public function showRecoveryCodes(Request $request)
    {
        return $request->user()->generateRecoveryCodes();
    }
}
