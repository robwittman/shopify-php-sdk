<?php

/**
 * This is the core handler for all Shopify API requests.
 *
 * The only metadata that this class needs to start executing requests is
 * a store to request on, and an access token to authenticate with. The API
 * key and secret are only used to get these access tokens
 *
 * 
 */
namespace Shopify;

class Shopify
{
    /**
     * API Key used for requests
     * @var string
     */
    public static $api_key;

    /**
     * API Secret
     *
     * Only needed during OAuth requests
     * @var string
     */
    public static $api_secret;

    /**
     * Domain for requests
     * @var strings
     */
    public static $store_domain;

    /**
     * Access Token for a given store
     * @var string
     */
    public static $access_token;

    /**
     * API Version to user for requests
     * @var float
     */
    public static $api_version = NULL;

    /**
     * API Execution options
     * @var array
     */
    public static $api_options = array();

    /**
     * Retrieve our API Key
     * @return string
     */
    public static function getApiKey()
    {
        return self::$api_key;
    }

    /**
     * Retrieve the API Key used to instantiate our API Handler
     * @return string
     */
    public static function getApiSecret()
    {
        return self::$api_secret;
    }

    /**
     * Set our API Ket
     * @param void
     */
    public static function setApiCreds($key, $secret)
    {
        self::$api_key = $key;
        self::$api_secret = $secret;
    }

    /**
     * Set the API Version to user for requests
     * @param float $version
     */
    public static function setApiVersion($version)
    {
        self::$api_version = $version;
    }

    /**
     * Retrieve the API version for requests
     * @return [type] [description]
     */
    public static function getApiVersion()
    {
        return self::$api_version;
    }
    /**
     * Set the store to make API requests on behalf of
     * @param string $store
     * @param string $token  Store Access Token
     */
    public static function setStore($store, $token = NULL)
    {
        self::$store_domain = $store;
        self::$access_token = $access_token;
    }

    /**
     * Retrieve the store we've intialized the API for
     * @return string
     */
    public static function getStore()
    {
        return self::$store_domain;
    }

    /**
     * Retrieve the token we've initialized the API for
     * @return string
     */
    public static function getAccessToken()
    {
        return self::$access_token;
    }

    public static function baseUrl()
    {
        if(is_null(self::$store_domain))
        {
            throw new Exception("Calling API without instantiating you store. Use \\Shopify\\Shopify::setStore(store, access_token) to bootstrap");
        }
        return sprintf("https://%s/admin/", self::$store_domain);
    }
}
