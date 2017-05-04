<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ProductImage;
use Shopify\Options\ProductImage\GetOptions;
use Shopify\Options\ProductImage\ListOptions;
use Shopify\Options\ProductImage\CountOptions;

class ProductImageService extends AbstractService
{
    public static $className = ProductImage::class;
}
