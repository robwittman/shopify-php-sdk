<?php

namespace Shopify;

class Auth
{
    public static $nonce = NULL;
    public static $auth_uri = 'admin/oauth/authorize';
    public static $token_uri = 'admin/oauth/access_token';

    public static function authorizationUrl()
    {
        $params = array(
            'redirect_uri'  => \Shopify\Shopify::redirect_uri(),
            'client_id'     => \Shopify\Shopify::api_key(),
            'scope'         => \Shopify\Shopify::permissions()
        );
        if(is_null(self::$nonce) && \Shopify\Shopify::strict())
        {
            throw new \Exception("Trying to use strict API without nonce");
        }
        if(!is_null(self::$nonce)) $params['state'] = self::$nonce;
        return sprintf("https://%s/%s?%s", \Shopify\Shopify::store(), self::$auth_uri, http_build_query($params));
    }

    public static function accessToken()
    {
        // Do any strict checking for our OAuth requests
        if(\Shopify\Shopify::strict())
        {
            if( is_null(self::$nonce) || ! isset( $_GET['state'])) throw new \Exception("Strict API execution requires a nonce for Authentication requests");
            if(!\Shopify\Shopify::strict() && !\Shopify\Shopify::validateHmac()) throw new \Exception("Strict API execution requires a valid HMAC signature");
        }
        return \Shopify\AccessToken::createFromCode($_GET['code']);
    }

    public static function setNonce($nonce)
    {
        self::$nonce = $nonce;
    }
}
