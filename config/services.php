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
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => 'http://127.0.0.1:8000/auth/google/call-back',
    ],

    'apple' => [
        'client_id' => 'com.megabot.app-id',
        'client_secret' => 'eyJraWQiOiJQQzRDODVLVlJEIiwiYWxnIjoiRVMyNTYifQ.eyJpc3MiOiJLRDlaOFFNRDNZIiwiaWF0IjoxNjgyOTQ3OTc2LCJleHAiOjE2OTg0OTk5NzYsImF1ZCI6Imh0dHBzOi8vYXBwbGVpZC5hcHBsZS5jb20iLCJzdWIiOiJjb20ubWVnYWJvdC5hcHAtaWQifQ.K7LKKngKxd6-y-vnhxE8bXWAWF0oqyPx2fJJZExis4V9Jce8JRq3tY5ehuCrfmjC5aZqLeEM8Ebo3R4oEGBFGQ',
        'redirect' => 'https://megabot.webiots.co.in/auth/apple/call-back',
    ],
];
