<?php

namespace Shopify;

use Shopify\Exception;
use Shopify\Util;

abstract class AbstractObject extends AbstractResource
{
    /**
     * Endpoint to use for object requests
     * @var string
     */
    protected static $classUrl;

    /**
     * The handle used in API Responses
     * @var string
     */
    protected static $classHandle;

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
     * Get the endpoint for thie objects API
     * @return string
     */
    public static function getEndpoint()
    {
        return static::$classUrl;
    }

    /**
     * Retrieve array of objects in namespace
     * @param  array  $params URL Params to pass
     * @return array Created Shopify Objects
     */
    public static function all($params = array())
    {
        $resp = self::call(static::$classUrl, 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    /**
     * Fetch a single item
     * @param  integer $id ID of the resource
     * @return object
     */
    public static function get($id = 0)
    {
        $resp = self::call(static::$classUrl.'/'.$id , 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    /**
     * Retrieve a count of the resource
     * @return integer
     */
    public static function count()
    {
        $resp = self::call(static::$classUrl.'/count', 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }


    /**
     * Create a new item of [resource]
     * @return self
     */
    public function create()
    {
        if(isset($this->id))
        {
            throw new Exception\ApiException("This object already has an ID");
        }
        $resp = self::call(static::$classUrl, 'POST', array(static::$classHandle => $this));
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
        $resp = self::call(static::$classUrl.'/'.$this->id, 'PUT', array(static::$classHandle => $this));
        $this->refresh($resp->{static::$classHandle});
        return $resp;
    }

    /**
    * Delete a resource
    * @param  integer $id ID of the resource
    * @return boolean
    */
    public function delete()
    {
        $this->assureId();
        $resp = self::call(static::$classUrl.'/'.$this->id, 'DELETE');
        return Util\ObjectSet::createObjectFromJson($resp);
    }
}
