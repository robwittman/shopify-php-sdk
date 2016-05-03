<?php

namespace Shopify;

use Shopify\Util;

class Product extends AbstractObject
{
    protected static $classUrl = 'products';

    public function __construct($data = array())
    {
        foreach($data->product as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public function all()
    {
        return self::call(self::$classUrl, 'GET');
    }

    public function get()
    {

    }
}
