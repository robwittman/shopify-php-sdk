<?php

require_once 'path/to/vendor/autoload.php';

// Set our arguments for the SDK. These should be stored in another file
$options = [
    'api_key'       => '<shopify_api_key>',
    'api_secret'    => '<shopify_api_secret>',
    'redirect_url'  => 'https://localhost/shopify',
    'store'         => '<store_name>',
    'permissions'   => 'read_products',
    'strict'        => FALSE    // This disables response verifications
];

// Initialize the SDK using arguments
\Shopify\Shopify::init($options);

/* Now we check if we are starting an OAuth request request, or handling a
   response from Shopify. Checking for ?code=<auth_code> should suffice */
if( !isset( $_GET['code'] ) )
{
    header("Location: ".\Shopify\Auth::authorizationUrl());
}
else
{
    try {
        $accessToken = \Shopify\Auth::accessToken();
    } catch(Exception $e) {
        echo $e->getMessage();
        exit();
    }

    echo $accessToken; // 53e20e750c89274d02b53927135fd664
}
