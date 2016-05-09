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
            throw new Exception\ApiException("Trying to use strict API without nonce");
        }
        if(!is_null(self::$nonce)) $params['state'] = self::$nonce;
        return sprintf("https://%s/%s?%s", \Shopify\Shopify::store(), self::$auth_uri, http_build_query($params));
    }

    /**
     * Fetch an access token
     * @return \Shopfiy\AccessToken
     */
    public static function accessToken()
    {
        // Do any strict checking for our OAuth requests
        if(\Shopify\Shopify::strict())
        {
            if( is_null(self::$nonce) || ! isset( $_GET['state'])) throw new \Exception("Strict API execution requires a nonce for Authentication requests");
            if(!\Shopify\Shopify::strict() && !\Shopify\Shopify::validateHmac()) throw new Exception\ApiException("Strict API execution requires a valid HMAC signature");
        }
        return \Shopify\AccessToken::createFromCode($_GET['code']);
    }

    /**
     * Set a nonce, used to secure API requests
     * @param string $nonce
     */
    public static function setNonce($nonce)
    {
        self::$nonce = $nonce;
    }
}
