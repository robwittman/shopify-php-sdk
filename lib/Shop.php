<?php

/**
 * Shop object
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/shop
 */

namespace Shopify;

class Shop extends AbstractObject
{
    /**
     * Endpoint for this resource
     * @var string
     */
    protected static $classUrl = 'shop';

    /**
     * API response handle
     * @var string
     */
    protected static $handle = 'shop';

    /**
     * This is overridden since the shop is a singleton
     * object in Shopify's domain.
     *
     * @return self
     */
    public static function get()
    {
        $resp = self::call(self::$classUrl, 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }
}
