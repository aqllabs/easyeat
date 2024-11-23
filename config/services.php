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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'cashier' => [
        'currency' => env('CASHIER_CURRENCY', 'USD'),
        'currency_symbol' => env('CASHIER_CURRENCY_SYMBOL', '$'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'trial_period_days' => env('STRIPE_TRIAL_PERIOD_DAYS', 7),
        'allow_promotion_codes' => env('STRIPE_ALLOW_PROMOTION_CODES', true),
    ],

    'lemonsqueezy' => [
        'base_url' => 'https://api.lemonsqueezy.com/v1',
        'key' => env('LEMON_SQUEEZY_API_KEY'),
        'store' => env('LEMON_SQUEEZY_STORE'),
    ],

    'openai' => [
        'key' => env('OPENAI_KEY'),
        'urls' => [
            'base' => 'https://api.openai.com/v1/',
            'completion' => 'chat/completions',
            'images' => 'images/generations',
            'text-to-speech' => 'audio/speech',
        ],
        'models' => [
            'gpt4o' => 'gpt-4o',
            'gpt4' => 'gpt-4-turbo',
            'gpt3.5' => 'gpt-3.5-turbo',
            'dalle' => 'dall-e-3',
            'tts-1' => 'tts-1',
        ],
    ],

    'github' => [
        'client_id' => env('GITHUB_CLIENT_ID'),
        'client_secret' => env('GITHUB_CLIENT_SECRET'),
        'redirect' => '/auth/callback/github',
    ],

    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => '/auth/callback/twitter',
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => '/auth/callback/google',
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'unsplash' => [
        'access_key' => env('UNSPLASH_ACCESS_KEY'),
    ],
];
