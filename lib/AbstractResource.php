<?php

namespace Shopify;

use Shopify\Util;
use Shopify\Exception;

abstract class AbstractResource
{
    /**
    * Create an instance using returned API JSON data
    * @param array $data
    * @return void
    */
    public function __construct($data = array())
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    /**
     * Make a call to Shopify API Server
     * @param  string $path   URL to request
     * @param  string $method URL Request method
     * @param  array  $params URL Params to provide
     * @param  boolean $jsonify Only passed as false for Auth requests
     * @return array         HTTP Client response
     */
    public static function call($path, $method = 'GET', $params = array())
    {
        return \Shopify\Shopify::call($path, $method, $params);
    }


    /**
     * Every object can be created from JSON
     * @param  array $val      API response
     * @param  array $options
     * @return object
     */
    public static function createFromJson($val, $options)
    {
        return new static($val, $options);
    }

    /**
     * Refresh the object's attributes from response
     * @param  object $data API Response
     * @return void
     */
    public function refresh($data)
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public function assureId()
    {
        if(!isset($this->id))
        {
            throw new Exception\ApiException("ID Field is required");
        }
        return TRUE;
    }
}
