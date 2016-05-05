<?php
/**
 * \Shopify\CarrierService
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/carrierservice
 */
namespace Shopify;

class CarrierService
{
    public static function __callStatic($method, $args)
    {
        throw new \Exception("The CarrierService object has not been completed yet");
    }

    public function __construct()
    {
        throw new \Exception("The CarrierService object has not been completed yet");
    }
}
