<?php

namespace Shopify;

use Shopify\Exception;
use Shopify\Util;

abstract class AbstractObject extends AbstractResource
{
    public function __construct($data = array())
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public static function getHandle()
    {
        return static::$handle;
    }
}
