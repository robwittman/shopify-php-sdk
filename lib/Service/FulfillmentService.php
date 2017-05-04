<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Fulfillment;
use Shopify\Options\Fulfillment\GetOptions;
use Shopify\Options\Fulfillment\ListOptions;
use Shopify\Options\Fulfillment\CountOptions;

class FulfillmentService extends AbstractService
{
    public static $className = Fulfillment::class;

    public static $endpoint = 'fulfillments';
}
