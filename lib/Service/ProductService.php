<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Product;

class ProductService extends AbstractService
{
    public static $className = Product::class;

    public function all(array $params = array())
    {
        $request = new Request('GET', '/admin/products.json');
        return $this->getEdge($request, $params, Product::class);
    }
}
