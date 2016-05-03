<?php

namespace Shopify;

use Shopify\Util;
use Shopify\Exception;

abstract class AbstractResource
{
    protected static $classUrl;

    public static function classUrl()
    {
        return self::$classUrl;
    }

    public static function call($path, $method = 'GET', $params = array())
    {
        $data = \Shopify\Shopify::call($path, $method, $params);
        // Only the first object in the response contains object data
        $instance = new static($data[0]);
        return $instance;
    }
}
