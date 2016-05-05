<?php
/**
 * \Shopify\ShippingZone
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/shipping_zone
 */
namespace Shopify;

use Shopify\Util;

class ShippingZone extends AbstractObject
{
    protected static $handle = 'shipping_zone';
    protected static $classUrl = 'shipping_zones';
}
