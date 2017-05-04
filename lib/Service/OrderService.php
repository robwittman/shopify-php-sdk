<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Order;

class OrderService extends AbstractService
{
    public static $className = Order::class;

    public static $endpoint = 'orders';
}
