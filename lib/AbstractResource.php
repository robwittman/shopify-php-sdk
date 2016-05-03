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

        var_dump($data);
        if(isset($data[0])->{$classHandle})
        {
            $instance = new static($data[0]->{$classHandle});
            return $instance;
        } else if(isset($data[0]->{$classHandle.'s'}) {
            return ObjectSet::createArrayFromJson($class, $data[0]->{$classHandle.'s'});
        } else {
            throw new Exception("Unable to instantiate response from $path.json");
        }
        // Only the first object in the response contains object data
    }
}
