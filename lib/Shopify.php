<?php

namespace Shopify;

class Shopify
{
    public static $api_key;
    public static $api_secret;
    public static $redirect_uri;
    public static $permissions;
    public static $store;
    public static $nonce = FALSE;
    public static $auth_uri = 'admin/oauth/authorize';
    public static $token_uri = 'admin/oauth/access_token';
    public static $strict = TRUE;

    public static function init(array $opts = array())
    {
        self::setOpt($opts);
    }

    public static function setOpt($key, $value = NULL)
    {
        if(is_array($key))
        {
            foreach($key as $k => $v)
            {
                self::setOpt($k, $v);
            }
        } else {
            if(!property_exists(self, $key))
            {
                return;
            }
            self::$$key = $value;
        }
    }

    public static function __callStatic($method, $args)
    {
        if(property_exists(self, $method))
        {
            return self::$$method;
        }
    }
}
