<?php
/**
 * \Shopify\Refund
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/refund
 */
namespace Shopify;

class Refund extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = NULL;
    protected static $classUrl = 'refunds';
    protected static $handle = 'refund';
}
