<?php

namespace Shopify;

class Shopify
{
    protected static $instance;
    protected $client;

    public static $api_key;
    public static $api_secret;
    public static $redirect_uri;
    public static $permissions;
    public static $store;
    public static $strict = TRUE;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public static function init(array $opts = array())
    {
        $api = new static(new Client());
        static::setInstance($api);
        return $api;
    }

    public static function instance()
    {
        return static::$instance;
    }

    public static function setInstance(Shopify $instance)
    {
        static::$instance = $api;
    }

    public function call($path, $method, array $params = array())
    {
        $request = $this->prepareRequest();
        $response = $request->execute();
    }

    public static function test($url)
    {
        return self::instance()->client->request('GET', $url);
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
            if(!property_exists(__CLASS__, $key))
            {
                return;
            }
            self::$$key = $value;
        }
    }

    public static function __callStatic($method, $args)
    {
        if(property_exists(__CLASS__, $method))
        {
            return self::$$method;
        }
    }

    public static function baseUrl()
    {
        return sprintf('https://%s/admin/', self::$store);
    }
}
