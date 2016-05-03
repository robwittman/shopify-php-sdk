<?php

namespace Shopify;

use Shopify\Util;

class Product extends AbstractObject
{
    protected static $classUrl = 'products';

    public function all()
    {
        return self::call(self::$classUrl, 'GET');
    }

    public function get()
    {

    }
}
