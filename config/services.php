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
    'firebase' => [
        'api_key' => 'AIzaSyAHeWRCgmFIlTpsAec5RCnGGo5uSaLdf5Y',
        'auth_domain' => 'electoral-e17e0.firebaseapp.com',
        'database_url' => 'https://electoral-e17e0-default-rtdb.firebaseio.com',
        'project_id' => 'electoral-e17e0',
        'storage_bucket' => 'electoral-e17e0.appspot.com',
        'messaging_sender_id' => '842154102632',
        'app_id' => '1:842154102632:web:bbe13ae8160de5694f10dd', 
        'certificados_push_web' => 'BD6dq68-yO5WNZ8dokxrXdg6Mkzr4F2RKDX466lA8ubQkU1TvkbnEtzzPYMFexoqC9BvCzNee0w3D-_NyIMPSuE', 
  
    ]

];
