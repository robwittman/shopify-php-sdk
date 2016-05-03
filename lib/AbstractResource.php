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
        $class = get_called_class();
        $classHandle = $class::getHandle();

        // Only the first object in the response contains object data
        if(is_array($data[0]))
        {
            return ObjectSet::createArrayFromJson(get_called_class(), $data[0]->{$classHandle.'s'});
        }

        $instance = new static($data[0]->{$classHandle});
        return $instance;
    }
}
