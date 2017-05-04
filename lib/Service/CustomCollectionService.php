<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\CustomCollection;
use Shopify\Options\CustomCollection\GetOptions;
use Shopify\Options\CustomCollection\ListOptions;
use Shopify\Options\CustomCollection\CountOptions;

class CustomCollectionService extends AbstractService
{
    public static $className = CustomCollection::class;

    public static $endpoint = 'custom_collections';
}
