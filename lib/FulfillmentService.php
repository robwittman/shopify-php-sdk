<?php

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
