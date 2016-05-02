<?php

namespace Shopify;

class Auth
{
    public static $api_key;
    public static $api_secret;
    public static $redirect_uri;
    public static $permissions;
    public static $store;
    public static $nonce = NULL;
    public static $auth_uri = 'oauth/authorize';
    public static $token_uri = 'oauth/access_token';

    public static function init(array $opts)
    {
        if(!array_key_exists('api_key', $opts) ||
           !array_key_exists('api_secret', $opts) ||
           !array_key_exists('redirect_uri', $opts) ||
           !array_key_exists('permissions', $opts) ||
           !array_key_exists('store', $opts))
        {
            throw new \Exception("Initialization options missing for \Shopify\Auth::init()");
        }
        self::$api_key = $opts['api_key'];
        self::$api_secret = $opts['api_secret'];
        self::$redirect_uri = $opts['redirect_uri'];
        self::$permissions = $opts['permissions'];
        self::$store = $opts['store'];
        if(array_key_exists('nonce', $opts)) self::$nonce = $opts['nonce'];
    }

    public static function authorizationUrl()
    {
        $params = array(
            'redirect_uri'  => self::$redirect_uri,
            'client_id'     => self::$api_key,
            'scope'         => self::$permissions
        );
        if(!is_null(self::$nonce)) $params['nonce'] = self::$nonce;
        return sprintf("https://%s/admin/%s?%s", self::$store, self::$auth_uri, http_build_query($params));
    }

    public static function accessToken()
    {

    }
}
