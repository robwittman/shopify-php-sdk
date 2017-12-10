<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Order;
use Shopify\Service\OrderService;

class OrderServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/OrdersList.json');
        $service = new OrderService($api);
        $orders = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Order::class,
            $orders
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Order.json');
        $service = new OrderService($api);
        $order = $service->get(1);
        $this->assertInstanceOf(Order::class, $order);
    }
}
