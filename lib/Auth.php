<?php

namespace Shopify;

class Auth
{
    public static function authorizationUrl()
    {
        $params = array(
            'redirect_uri'  => \Shopify\Shopify::redirect_uri(),
            'client_id'     => \Shopify\Shopify::$api_key,
            'scope'         => \Shopify\Shopify::$permissions
        );
        if(!\Shopify\Shopify::$nonce && \Shopify\Shopify::$strict)
        {
            throw new \Exception("Trying to use strict API without nonce");
        }
        if(\Shopify\Shopify::$nonce) $params['state'] = \Shopify\Shopify::$nonce;
        return sprintf("https://%s/%s?%s", \Shopify\Shopify::$store, \Shopify\Shopify::$auth_uri, http_build_query($params));
    }

    public static function accessToken()
    {
        if(\Shopify\Shopify::$strict && (!\Shopify\Shopify::$nonce || !isset($_GET['state'])))
        {
            throw new \Exeception("Strict API authentication attempted, and no nonce provided");
        }
    }
}
