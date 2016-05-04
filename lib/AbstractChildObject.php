<?php

namespace Shopify;

use Shopify\Util;
use Shopify\Http;
use Shopify\Exception;

class AbstractChildObject extends AbstractResource
{
    protected static $parentUrl;
    protected static $parentIdField;

    public function __construct($data)
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public static function all($parentId, $params = array())
    {
        return self::call(static::parentUrl().'/'.$parentId.'/'.static::$classUrl, 'GET', $params);
    }

    public static function count($parentId)
    {
        return self::call(static::parentUrl().'/'.$parentId.'/'.static::$classUrl.'/count', 'GET');
    }

    public static function parentUrl()
    {
        return static::$parentUrl;
    }

    public static function parentIdField()
    {
        return static::$parentIdField;
    }
}
