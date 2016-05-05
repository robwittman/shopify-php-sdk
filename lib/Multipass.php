<?php
/**
 * \Shopify\Multipass
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/multipass
 */
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
