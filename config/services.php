<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id'     => '660427695771-bpcltcqqm3qs099nir9m48f32a1lgk81.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      => 'https://www.bagdones.com/app/google/callback'
    ],

    'facebook' => [
        'client_id' => '481481440635262', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'client_secret' => '7238259e0ec177d1e642bd534075aacf', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://www.bagdones.com/app/facebook/callback'
    ],

    'stripe' => [
        'key'   => env('STRIPE_PUBLIC_KEY'),
        'secret' => env('STRIPE_SECRET_KEY'),
    ],

    'fcm' => [
        'key' => env('FCM_SECRET_KEY')
    ]



];
