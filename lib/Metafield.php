<?php
/**
 * \Shopify\Metafield
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/metafield
 */
namespace Shopify;

class Metafield
{
    public static function __callStatic($method, $args)
    {
        throw new \Exception("The Metafield object has not been completed yet");
    }

    public function __construct()
    {
        throw new \Exception("The Metafield object has not been completed yet");
    }
}
