<?php

namespace Shopify;

use Shopify\Http\Client;
use Shopify\Exception;
use Shopify\Util;

class Shopify
{
    protected static $instance;
    protected $client;

    public static $api_key;
    public static $api_secret;
    public static $redirect_uri;
    public static $permissions;
    public static $store;
    public static $access_token;
    public static $strict = TRUE;
    public static $debug = FALSE;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public static function init(array $opts = array())
    {
        $api = new static(new Client());
        $api::setOpt($opts);
        static::setInstance($api);
        return $api;
    }

    public static function instance()
    {
        return static::$instance;
    }

    public static function setInstance(Shopify $instance)
    {
        static::$instance = $instance;
    }

    public function call($path, $method = 'GET', array $params = array() ,$jsonify = true)
    {
        $path = self::baseUrl().$path.'.json';
        $data = self::instance()->getClient()->request($method, $path, $params, $jsonify);
        return $data;
    }

    public function getClient()
    {
        return $this->client;
    }

    public static function test($url, $method = 'GET')
    {
        return self::instance()->getClient()->request($method, $url);
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
        throw new \Exception("Call to undefined function {$method}");
    }

    public static function baseUrl()
    {
        return sprintf('https://%s/admin/', self::$store);
    }
}
