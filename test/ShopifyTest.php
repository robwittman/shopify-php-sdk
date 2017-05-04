<?php


namespace Shopify\Test;

use Shopify\Api;
use Shopify\Inflector;

session_start();

class ShopifyTest extends \PHPUnit\Framework\TestCase
{
    public function getApi($params)
    {
        $api = new Api();
        foreach ($params as $key => $value) {
            $pascal = Inflector::snakeToPascal($key);
            $method = 'set'.$pascal;
            $api = $api->{$method}($value);
        }
        return $api;
    }

    public function testTrue()
    {
        $this->assertTrue(true);
    }
}
