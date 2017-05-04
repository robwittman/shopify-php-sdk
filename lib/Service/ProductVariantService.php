<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ProductVariant;

class ProductVariantService extends AbstractService
{
    public static $className = ProductVariant::class;
}
