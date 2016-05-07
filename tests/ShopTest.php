<?php

namespace Shopify;

class ShopTest extends TestCase
{
    public function testInit()
    {
        $this->assertTrue(true);
    }

    public function testShopGet()
    {
        $shop = Shop::get();

        $this->assertInstanceOf('\Shopify\Shop', $shop);
    }
}
