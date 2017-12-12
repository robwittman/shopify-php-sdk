<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Shop;
use Shopify\Service\ShopService;

class ShopServiceTest extends TestCase
{
    public function testGet()
    {
        $api = $this->getApiMock('objects/Shop.json');
        $service = new ShopService($api);
        $shop = $service->get(1234);
        $this->assertInstanceOf(Shop::class, $shop);
    }
}
