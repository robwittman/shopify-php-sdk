<?php

namespace Shopify;

class Auth
{
    public static function authorizationUrl()
    {
        $params = array(
            'redirect_uri'  => \Shopify\Shopify::redirectUrl(),
            'client_id'     => \Shopify\Shopify::getApiKey(),
            'scope'         => \Shopify\Shopify::getPermissions()
        );
        return sprintf("https://%s/admin/%s?%s", self::$store, self::$auth_uri, http_build_query($params));
    }

    public static function accessToken()
    {
        
    }
}
