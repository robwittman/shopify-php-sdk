<?php
/**
 * \Shopify\Customer
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/customer
 */
namespace Shopify;

use Shopify\Util;

class Customer extends AbstractObject
{
    protected static $handle = 'customer';
    protected static $classUrl = 'customers';
}
