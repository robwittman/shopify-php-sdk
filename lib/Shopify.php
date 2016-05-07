<?php

/**
 * Core handler for the Shopify API
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference
 */

namespace Shopify;

use Shopify\Http\Client;
use SHopify\Http\TestClient;
use Shopify\Exception;
use Shopify\Util;

class Shopify
{
    /**
     * Singleton instance of the SDK
     * @var Shopify
     */
    protected static $instance;

    /**
     * Handle for the HTTP Client
     * @var Client
     */
    protected $client;

    /**
     * Shopify APP Key
     * @var string
     */
    public static $api_key;

    /**
     * Shopify APP Secret
     * @var string
     */
    public static $api_secret;

    /**
     * URL to redirect after Authentication
     * @var string
     */
    public static $redirect_uri;

    /**
     * Comma separated string of application permissions
     * @var string
     */
    public static $permissions;

    /**
     * The store we are initializing for
     * @var string
     */
    public static $store = 'test-shop.myshopify.com';

    /**
     * Access token for the given store
     * @var string
     */
    public static $access_token;

    /**
     * Wether the SDK runs in strict mode. Defaults to TRUE
     * @var boolean
     */
    public static $strict = TRUE;

    /**
     * Wether the SDK runs in debug mode. Defaults to FALSE
     * @var boolean
     */
    public static $debug = FALSE;

    /**
     * Wether the SDK is loaded in test functionality
     *
     * This loads the TestClient instead of our API Client
     * @var boolean
     */
    public static $test = FALSE;

    /**
     * Instantiate our API
     * @param Client $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Set our API options
     * @param  array  $opts
     * @return Shopify
     */
    public static function init(array $opts = array())
    {
        $client = ((isset($opts['test']) && $opts['test']) || self::test()) ? new TestClient() : new Client();
        $api = new static($client);
        $api::setOpt($opts);
        static::setInstance($api);
        return $api;
    }

    /**
     * Fetch the instance of our API
     * @return \Shopify\Shopify
     */
    public static function instance()
    {
        return static::$instance;
    }

    /**
     * Set our API instance
     * @param \Shopify\Shopify $instance
     */
    public static function setInstance(\Shopify\Shopify $instance)
    {
        static::$instance = $instance;
    }

    /**
     * Make a call to our client
     * @param  url $path
     * @param  string $method
     * @param  array  $params
     * @return mixed
     */
    public function call($path, $method = 'GET', $params)
    {
        $path = self::baseUrl().$path.'.json';
        $req = new \Shopify\Http\Request($path, $method, $params, [
            'X-Shopify-Access-Token' => self::access_token(),
            'Content-Type' => 'application/json'
        ]);
        $data = self::instance()->getClient()->request($req);
        return $data->getJsonBody();
    }

    /**
     * Fetch our client handler
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set options for our API SDK
     * @param string|array $key
     * @param mixed $value
     */
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

    /**
     * Allow dynamic accessibility to static attributes
     * @param  string $method
     * @param  mixed $args
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        if(property_exists(__CLASS__, $method))
        {
            return self::$$method;
        }
        throw new \Exception("Call to undefined function {$method}");
    }

    /**
     * Return the root API url based on the authenticated store
     * @return string
     */
    public static function baseUrl()
    {
        return sprintf('https://%s/admin/', self::$store);
    }
}
