<?php

require_once 'path/to/vendor/autoload.php';

// Initialize our storage engine. Replace this with whichever storage mechanism you want to use
$storageEngine = new StorageEngine();
// Set our arguments for the SDK. These should be stored in another file
$options = [
    'api_key'       => '<shopify_api_key>',
    'api_secret'    => '<shopify_api_secret>',
    'redirect_url'  => 'https://localhost/shopify',
    'store'         => '<store_name>',
    'permissions'   => 'read_products',
];

// Initialize the SDK using arguments
\Shopify\Shopify::init($options);

/* Now we check if we are starting an OAuth request request, or handling a
   response from Shopify. Checking for ?code=<auth_code> should suffice */
if( !isset( $_GET['code'] ) )
{
    // We need to initiate the OAuth flow. Generate a nonce we can store for
    // security purposes
    $nonce = \Shopify\Auth::generateNonce();

    // In order to compare the nonce when they return, it needs to be stored somewhere.
    $storageEngine->store('auth_nonce', $nonce);

    // We can now send the user to Shopify for authentication
    header("Location: ".\Shopify\Auth::authorizationUrl());
}
else
{
    // We are handling an authentication resposne from Shopify. We need to validate the
    // request, and then exchange the code for an access token

    // First, we get the nonce we stored
    $nonce = $storageEngine->retrieve('auth_nonce');
    // Set the nonce property of \Shopify\Auth so it can compare response -> request
    \Shopify\Auth::setNonce($nonce);
    // Finally, attempt to get the access token. If there is no nonce present, or the
    // store nonce does not match the one present in Shopify's response, or the HMAC
    // signature fails, this will throw an exception
    try {
        $accessToken = \Shopify\Auth::accessToken();
    } catch(Exception $e) {
        echo $e->getMessage(); // Authentication failed for some reason
        exit();
    }

    echo $accessToken; // 53e20e750c89274d02b53927135fd664
}


/**
 * This is a very crude representation of session management.
 * This could be replaced with DB storage, redis, or your frameworks session library
 *
 * **For demo purposes only**
 */
class StorageEngine {
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function store($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function retrieve($key) {
        return $_SESSION[$key];
    }
}
