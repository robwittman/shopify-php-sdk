<?php

namespace Shopify;

class Shop extends AbstractObject
{
    protected static $classUrl = 'shop';

    /**
     * This is overridden since the shop is a singleton
     * object in Shopify's domain.
     *
     * @return self
     */
    public static function get()
    {
        return self::call(self::$classUrl, 'GET');
    }

    public function __construct($data = array())
    {
        foreach($data->shop as $key => $value)
        {
            $this->{$key} = $value;
        }
    }
}
