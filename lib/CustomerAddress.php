<?php
/**
 * \Shopify\CustomerAddress
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/customeraddress
 */
namespace Shopify;

class CustomerAddress extends AbstractChildObject
{
    protected static $parentUrl = 'customers';
    protected static $parentIdField = NULL;
    protected static $classUrl = 'addresses';
    protected static $handle = 'customer_address';
}
