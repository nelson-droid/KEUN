<?php
// M-Pesa API Configuration
define('MPESA_CONSUMER_KEY', 'dOkBZIxcyWSxW4XM7IgKgycJnYkbkJDekiXaRk02iHHoViqC');
define('MPESA_CONSUMER_SECRET', 'h1NNvDdGdBEwuZuOib4STjGClrSJA6LKcA6OmYQ5Ot2uAPeyKXgylJ1eofTrGLvv');
define('MPESA_PASSKEY', 'YOUR_PASSKEY'); // Replace with your Passkey
define('MPESA_SHORTCODE', 'YOUR_SHORTCODE'); // Replace with your Shortcode
define('MPESA_CALLBACK_URL', 'YOUR_CALLBACK_URL'); // Replace with your callback URL

// Sandbox URLs
define('MPESA_AUTH_URL', 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
define('MPESA_STK_PUSH_URL', 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
define('MPESA_QUERY_URL', 'https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query');

// Production URLs (uncomment when going live)
// define('MPESA_AUTH_URL', 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
// define('MPESA_STK_PUSH_URL', 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest');
// define('MPESA_QUERY_URL', 'https://api.safaricom.co.ke/mpesa/stkpushquery/v1/query');
?> 