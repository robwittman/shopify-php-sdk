<?php

namespace Shopify;

use Shopify\Util;

class Product extends AbstractObject
{
    protected static $classUrl = 'products';
    protected static $handle = 'product';

    public function all()
    {
        return self::call(self::$classUrl, 'GET');
    }

    public function get()
    {

    }
}
