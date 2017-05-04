<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ProductVariant;
use Shopify\Options\ProductVariant\GetOptions;
use Shopify\Options\ProductVariant\ListOptions;

class ProductVariantService extends AbstractService
{
    public static $className = ProductVariant::class;
}
