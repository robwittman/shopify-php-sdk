<?php

namespace Shopify;

class Auth
{
    /**
     * Random nonce to ensure authentication requests have come from you
     * @var string
     */
    public static $nonce = NULL;

    /**
     * URI to initiate authenticatione
     * @var string
     */
    public static $auth_uri = 'admin/oauth/authorize';

    /**
     * POST URI to fetch access tokens
     * @var string
     */
    public static $token_uri = 'admin/oauth/access_token';

    /**
     * Generate URL to initiate authentication
     * @return string
     */
    public static function authorizationUrl()
    {
        $params = array(
            'redirect_uri'  => \Shopify\Shopify::redirect_uri(),
            'client_id'     => \Shopify\Shopify::api_key(),
            'scope'         => \Shopify\Shopify::permissions()
        );

        // Check if we require strict standards
        if(is_null(self::$nonce) && \Shopify\Shopify::strict())
        {
            throw new Exception\ApiException('Strict API execution requires a nonce be set');
        }
        if(!is_null(self::$nonce)) $params['state'] = self::$nonce;
        return sprintf("https://%s/%s?%s", \Shopify\Shopify::store(), self::$auth_uri, http_build_query($params));
    }

    /**
     * Fetch an access token
     * @param string $nonce
     * @return \Shopfiy\AccessToken
     */
    public static function accessToken()
    {
        // Do any strict checking for our OAuth requests
        if(\Shopify\Shopify::strict())
        {
            if( is_null( self::$nonce ) ) throw new \Exception('No nonce was set. use Auth::setNonce($nonce) to set one');
            if( !self::checkNonce( self::$nonce ) ) throw new \Exception("Authentication nonce failed verification");
            if( !\Shopify\Shopify::validateHmac() ) throw new Exception\ApiException("HMAC signature failed verification");
        }
        return \Shopify\AccessToken::createFromCode($_GET['code']);
    }

    /**
     * Set the nonce property
     * @param string $nonce
     */
    public static function setNonce($nonce)
    {
        self::$nonce = $nonce;
    }

    /**
     * Verify that nonces match
     * @param  string $nonce
     * @return boolean
     */
    public static function checkNonce($nonce)
    {
        return $nonce === $_GET['state'];
    }

    public static function getNonce()
    {
        return self::$nonce;
    }

    /**
     * Create a nonce to be used for authentication
     * @return string
     */
    public static function generateNonce( $save = TRUE )
    {
        if(is_null(\Shopify\Shopify::api_secret())) throw new Exception\ApiException("API Secret required for nonce generation");
        $nonce = hash_hmac('sha256', \Shopify\Shopify::store().'.'.time(),\Shopify\Shopify::api_secret() );

        if($save) self::setNonce($nonce);
        return $nonce;
    }
}
