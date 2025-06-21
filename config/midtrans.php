<?php

    return [
        'merchant_id' => env('MIDTRANS_MERCHANT_ID', 'your-merchant-id'),
        'server_key' => env('MIDTRANS_SERVER_KEY', 'your-server-key'),
        'client_key' => env('MIDTRANS_CLIENT_KEY', 'your-client-key'),
        'is_production' => env('MIDTRANS_IS_PRODUCTION', false),
        'is_sanitized' => env('MIDTRANS_IS_SANITIZED', true),
        'is_3ds' => env('MIDTRANS_IS_3DS', true),
        'payment_url' => env('MIDTRANS_PAYMENT_URL', 'https://app.sandbox.midtrans.com/snap/v4/redirection'),
    ];