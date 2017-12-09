<?php


namespace Shopify\Test;

use Shopify\Api;
use Shopify\Inflector;

session_start();

class ShopifyTest extends \PHPUnit\Framework\TestCase
{
    public function getApi($params)
    {
        return new Api($params);
    }

    public function testTrue()
    {
        $this->assertTrue(true);
    }
}
