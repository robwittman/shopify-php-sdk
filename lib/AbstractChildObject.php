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
        $data = self::call(static::parentUrl().'/'.$parentId.'/'.static::$classUrl, 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($data);
    }

    public static function count($parentId)
    {
        $resp = self::call(static::parentUrl().'/'.$parentId.'/'.static::$classUrl.'/count', 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public static function get($id, $parentId)
    {
        $resp = self::call(static::parentUrl().'/'.$parentId.'/'.static::$classUrl.'/'.$id, 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public function create()
    {
        if(isset($this->id))
        {
            throw new Exception\ApiException("This object already has an ID");
        }
        $this->assureParentId();
        $resp = self::call(static::$parentUrl.'/'.$this->{static::$parentIdField}.'/'.static::$classUrl, 'POST', array(static::$classHandle => $this));
        $this->refresh($resp->{static::$classHandle});
        return $resp;
    }

    /**
     * Update a resource
     * @return self
     */
    public function update()
    {
        $this->assureId();
        $this->assureParentId();
        $resp = self::call(static::$parentUrl.'/'.$this->{static::$parentIdField}.'/'.static::$classUrl.'/'.$this->id, 'PUT', array(static::$classHandle => $this));
        $this->refresh($resp->{static::$classHandle});
        return $resp;
    }

    /**
     * Delete a resuorce
     * @param  integer $parentId
     * @param  integer $id
     * @return NULL
     */
    public function delete()
    {
        $this->assureParentId();
        self::call(static::parentUrl().'/'.$this->{static::$parentIdField}.'/'.static::$classUrl.'/'.$this->id, 'DELETE');
        return NULL;
    }

    public function assureParentId()
    {
        if(!property_exists($this, static::$parentIdField) || is_null($this->{static::$parentIdField}))
        {
            throw new Exception\ApiException("The resource '".static::$classUrl."' requires '".static::$parentIdField."'");
        }
        return TRUE;
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
