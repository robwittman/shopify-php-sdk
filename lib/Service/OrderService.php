<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Order;
use Shopify\Options\Order\GetOptions;
use Shopify\Options\Order\ListOptions;
use Shopify\Options\Order\CountOptions;

class OrderService extends AbstractService
{
    public static $className = Order::class;

    public static $endpoint = 'orders';
}
