<?php

namespace Shopify;

class Multipass
{
    public static function __callStatic($method, $args)
    {
        throw new \Exception("The Multipass object has not been completed yet");
    }

    public function __construct()
    {
        throw new \Exception("The Multipass object has not been completed yet");
    }
}
