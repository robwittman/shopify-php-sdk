<?php

namespace Shopify;

use Shopify\Util;
use Shopify\Exception;

abstract class AbstractResource
{
    public static function call($path, $method = 'GET', $params = array(), $jsonify = true)
    {
        $data = \Shopify\Shopify::call($path, $method, $params, $jsonify)[0];
        return $data;
        // We just send the data to Util\ObjectSet, which instantiates all objects based on the response
    }

    /**
     * [createFromJson description]
     * @param  [type] $val     [description]
     * @param  [type] $options [description]
     * @return [type]          [description]
     */
    public static function createFromJson($val, $options)
    {
        return new static($val, $options);
    }
}
