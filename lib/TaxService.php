<?php
/**
 * \Shopify\TaxService
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/taxservice
 */
namespace Shopify;

class TaxService
{
    public static function __callStatic($method, $args)
    {
        throw new \Exception("The TaxService object has not been completed yet");
    }

    public function __construct()
    {
        throw new \Exception("The TaxService object has not been completed yet");
    }
}
