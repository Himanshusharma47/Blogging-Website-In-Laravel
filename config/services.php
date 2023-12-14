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
        'scheme' => 'https',
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
        'client_id' => '1014468972651-7fsru1h5lvkdk05vj029es8nbto6puld.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/auth/google/callback',
      ],

      'facebook' => [
        'client_id' => '1775446799638061',
        'client_secret' => '782165ed81c6d58dae21f0e6f6e1e573',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

];
