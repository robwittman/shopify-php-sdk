<?php

namespace Shopify;

class Shopify
{
    public static $api_key;
    public static $api_secret;
    public static $redirect_uri;
    public static $permissions;
    public static $store;
    public static $nonce = NULL;
    public static $auth_uri = 'admin/oauth/authorize';
    public static $token_uri = 'admin/oauth/access_token';

    public static function init(array $opts)
    {
        self::setOpts($opts);
    }

    public static function setOpts(array $opts)
    {
        foreach($opts as $key => $value)
        {
            self::$$key = $value;
        }
    }
}
