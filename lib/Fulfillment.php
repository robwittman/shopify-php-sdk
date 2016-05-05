<?php
/**
 * \Shopify\Fulfillment
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/fulfillment
 */
namespace Shopify;

class Fulfillment extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'fulfillments';
    protected static $handle = 'fulfillment';

    public function complete()
    {

    }

    public function open()
    {

    }

    public function cancel()
    {

    }
}
