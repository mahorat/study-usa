<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

//Socialite provieders api//
    'facebook' => [
        'app_id'        => '112090039497843',
        'client_id'        => '112090039497843',        
        'client_secret' => '309bbdfcb2cbe0d262a8ae28406b093f',
        'redirect'      => 'http://study.usa/auth/facebook/callback/',
    ],

    'google' => [
        'client_id'     => '',
        'client_secret' => '',
        'redirect'      => '',
    ],

    'github' => [
        'client_id' => 'a2b6b3e1a3b1aa25cc80',
        'client_secret'=> '6fdc9dade4ead509a2bc1c7bbb378967be51e582',
        'redirect' => 'http://study.usa/auth/github/callback/',
    ],

];
