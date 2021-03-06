<?php

return [
    /*
    |--------------------------------------------------------------------------
    | TwoFactorAuthentication Model
    |--------------------------------------------------------------------------
    |
    | When using the "TwoFactorAuthentication" trait from this package, we need
    | to know which Eloquent model should be used to retrieve your two factor
    | authentication records. You can use your own for more advanced logic.
    |
    */

    'model' => \DarkGhostHunter\Laraguard\Eloquent\TwoFactorAuthentication::class,

    /*
    |--------------------------------------------------------------------------
    | Cache Store
    |--------------------------------------------------------------------------
    |
    | Codes can only be used one time, so we will hold them in the cache for
    | the period it shouldn't be used again. You can customize the default
    | cache store to use. Using "null" will use the default cache store.
    |
    */

    'cache' => [
        'store'  => null,
        'prefix' => '2fa.code',
    ],

    /*
    |--------------------------------------------------------------------------
    | Recovery Codes
    |--------------------------------------------------------------------------
    |
    | This option controls the recovery codes generation. By default is enabled
    | so users have a way to authenticate without a code generator. The length
    | of the codes, as their quantity, can be configured to tighten security.
    |
    */

    'recovery' => [
        'enabled' => true,
        'codes'   => 10,
        'length'  => 8,
    ],

    /*
    |--------------------------------------------------------------------------
    | Safe Devices
    |--------------------------------------------------------------------------
    |
    | Authenticating with Two-Factor Codes can become very obnoxious when the
    | user does it every time. To "remember" a device where a 2FA code was
    | validated to not ask again you can enable Safe Device to save it.
    |
    */

    'safe_devices' => [
        'cookie'          => '_2fa_remember',
        'enabled'         => false,
        'max_devices'     => 3,
        'expiration_days' => 14,
    ],

    /*
    |--------------------------------------------------------------------------
    | Require Two-Factor Middleware
    |--------------------------------------------------------------------------
    |
    | When using the "2fa.confirm" middleware a view with a form will be used
    | to ask the user for a TOTP code, an a controller action to receive it.
    | You can change both actions and also when to forget the confirmation.
    |
    */

    'confirm' => [
        'timeout' => 10800, // 3 hours
        'view' => 'DarkGhostHunter\Laraguard\Http\Controllers\Confirm2FACodeController@showConfirmForm',
        'action' => 'DarkGhostHunter\Laraguard\Http\Controllers\Confirm2FACodeController@confirm'
    ],

    /*
    |--------------------------------------------------------------------------
    | Secret Length
    |--------------------------------------------------------------------------
    |
    | The package uses a shared secret length of 160-bit, as recommended by the
    | RFC 4226. This makes it compatible with most 2FA apps. You can change it
    | freely but consider the standard allows shared secrets down to 128-bit.
    |
    */

    'secret_length' => 20,

    /*
    |--------------------------------------------------------------------------
    | TOTP config
    |--------------------------------------------------------------------------
    |
    | While this package uses recommended RFC 4226 and RDC 6238 settings, you
    | can further configure how TOTP should work. These settings are saved
    | for each 2FA authentication, so it will only affect new accounts.
    |
    */

    'issuer' => env('OTP_TOTP_ISSUER'),

    'totp' => [
        'digits'    => 6,
        'seconds'   => 30,
        'window'    => 1,
        'algorithm' => 'sha1',
    ],

    /*
    |--------------------------------------------------------------------------
    | QR Code Config
    |--------------------------------------------------------------------------
    |
    | This package uses the BaconQrCode generator package to generate QR codes
    | as SVG. These size and image margin values are used to create them. You
    | can always your own code to create personalized QR Codes from the URI.
    |
    */

    'qr_code' => [
        'size'   => 400,
        'margin' => 4,
    ],
];
