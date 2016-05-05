<?php
/**
 * \Shopify\FulfillmentService
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/fulfillmentservice
 */
namespace Shopify;

class FulfillmentService
{
    public static function __callStatic($method, $args)
    {
        throw new \Exception("The FulfillmentService object has not been completed yet");
    }

    public function __construct()
    {
        throw new \Exception("The FulfillmentService object has not been completed yet");
    }
}
