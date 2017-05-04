<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ProductImage;

class ProductImageService extends AbstractService
{
    public static $className = ProductImage::class;
}
