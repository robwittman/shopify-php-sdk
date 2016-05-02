<?php

namespace Shopify;

class Auth
{
    public static function authorizationUrl()
    {
        $params = array(
            'redirect_uri'  => \Shopify\Shopify::$redirect_uri,
            'client_id'     => \Shopify\Shopify::$api_key,
            'scope'         => \Shopify\Shopify::$permissions
        );
        return sprintf("https://%s/admin/%s?%s", \Shopify\Shopify::$store, \Shopify\Shopify::$auth_uri, http_build_query($params));
    }

    public static function accessToken()
    {

    }
}
