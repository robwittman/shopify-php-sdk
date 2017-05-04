<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\SmartCollection;

class SmartCollectionService extends AbstractService
{
    public static $className = SmartCollection::class;

    public static $endpoint = 'smart_collections';
}
