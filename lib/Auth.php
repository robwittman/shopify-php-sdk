<?php

namespace Shopify;

class Auth
{
    /**
     * Authorzation Code for OAuth
     * @var string
     */
    public static $code;

    /**
     * Nonce for validating requests to OAuth
     * @var string
     */
    public static $nonce;

    /**
     * Array of permissions our application is going to requests
     * @var array
     */
    public static $permissions = array();

    /**
     * Reidrect URL for POST OAtuh
     * @var string
     */
    public static $redirect_url;

    /**
     * Get the link we need to send a store owner to for authentication
     * @return string
     */
    public static function authorizationUrl($redirect_url = NULL, $permissions = array())
    {
        if(is_null($redirect_url) && is_null(self::$redirect_url))
        {
            throw new Exception("You have not specified a redirect URL");
        }
        $params = array(
            'redirect_url' => is_null($redirect_url) ? self::$redirect_url : $redirect_url,
            'client_id' => Shopify::getApiKey(),
            'state' => self::generateNonce(),
        );

        if($perms = self::getPermissions()) $params['scope'] =  implode(',',$perms);

        return Shopify::baseUrl().'oauth/authorize?'.http_build_query($params);
    }

    /**
     * Get the access token from a successful OAuth requests
     * @param  string $nonce This is the nonce you want to validate against
     * @return string|boolean
     */
    public static function accessToken($nonce = NULL)
    {
        if(!is_null($nonce) && !self::$validateNonce($nonce))
        {
            throw new InvalidNonceException("Request did not pass the required nonce check");
        }
        
    }

    /**
     * Set the application Redirect URL
     * @param string
     */
    public static function setRedirectUrl($redirect_url)
    {
        self::$redirect_url = $redirect_url;
    }

    /**
     * Get the redirect URL
     * @return string
     */
    public static function getRedirecturl()
    {
        return self::$redirect_url;
    }

    /**
     * Get permissions we've set for the application
     * @return array
     */
    public static function getPermissions()
    {
        return self::$permissions;
    }

    /**
     * Set the permissions for our application
     * @param array $permissions
     */
    public static function setPermissions($permissions))
    {
        self::$permissions = $permissions;
    }

    /**
     * Set the nonce for auth requests.
     * @param string $nonce
     */
    public static function setNonce($nonce)
    {
        self::$nonce = $nonce;
    }

    /**
     * Retrieve the nonce used for OAuth request
     * @return string
     */
    public static function getNonce()
    {
        return self::$nonce;
    }

    /**
     * Generate a nonce to use in auth requests
     * Not recommended to use, but allows qick and dirty nonce generation
     *
     * @return string
     */
    public static function generateNonce()
    {
        return hash('sha256', uniqid());
    }
}
