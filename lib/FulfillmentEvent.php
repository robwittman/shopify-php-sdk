<?php

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
