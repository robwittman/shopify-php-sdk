<?php

namespace Shopify;

use Shopify\Exception;
use Shopify\Util;

abstract class AbstractObject extends AbstractResource
{
    protected static $classUrl;
    protected static $handle;

    public function __construct($data = array())
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public function refresh($data)
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public static function all($params = array())
    {
        $resp = self::call(static::$classUrl, 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public static function get($id)
    {
        $resp = self::call(static::$classUrl.'/'.$id , 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public static function count()
    {
        $resp = self::call(static::$classUrl.'/count', 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }


    public static function delete($id)
    {
        $resp = self::call(static::$classUrl.'/'.$id, 'DELETE');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public function create()
    {
        if(isset($this->id))
        {
            throw new Exception("This object already has an ID");
        }
        $resp = self::call(static::$classUrl, 'POST', array(static::$handle => $this));
        $this->refresh($resp->{static::$handle});
        return $resp;
    }

    public function update()
    {
        if(!isset($this->id))
        {
            throw new Exception("An object must exist in order to update it");
        }
        $resp = self::call(static::$classUrl.'/'.$this->id, 'PUT', array(static::$handle => $this));
        $this->refresh($resp->{static::$handle});
        return $resp;
    }
}
