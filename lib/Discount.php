<?php
/**
 * \Shopify\Discount
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/discount
 */
namespace Shopify;

use Shopify\Util;

class Discount extends AbstractObject
{
    protected static $handle = 'discount';
    protected static $classUrl = 'discounts';
}
