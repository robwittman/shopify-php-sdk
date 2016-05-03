<?php

namespace Shopify;

class Shop extends AbstractObject
{
    protected static $classUrl = 'shop';
    protected static $handle = 'shop';

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
}
