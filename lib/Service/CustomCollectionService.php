<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\CustomCollection;

class CustomCollectionService extends AbstractService
{
    public static $className = CustomCollection::class;

    public static $endpoint = 'custom_collections';
}
