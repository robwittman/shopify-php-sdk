<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Fulfillment;

class FulfillmentService extends AbstractService
{
    public static $className = Fulfillment::class;

    public static $endpoint = 'fulfillments';
}
