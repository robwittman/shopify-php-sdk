<?php
/**
 * \Shopify\FulfillmentEvent
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/fulfillmentevent
 */
namespace Shopify;

class FulfillmentEvent
{
    public static function __callStatic($method, $args)
    {
        throw new \Exception("The FulfillmentEvent object has not been completed yet");
    }

    public function __construct()
    {
        throw new \Exception("The FulfillmentEvent object has not been completed yet");
    }
}
