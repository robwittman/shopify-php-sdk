<?php

namespace Shopify\Service;

use Shopify\Object\Product;

class ProductService extends AbstractService
{
    /**
     * Receive a lists of all Products
     * @link https://help.shopify.com/api/reference/product#index
     * @param  array $params
     * @return Product[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/products.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Product::class);
    }

    /**
     * Receive a count of all Products
     * @link https://help.shopify.com/api/reference/product#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/products/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single product
     * @link https://help.shopify.com/api/reference/product#show
     * @param  integer $productId
     * @param  array $params
     * @return Product
     */
    public function get($productId, array $params = array())
    {
        $endpoint = '/admin/products/'.$productId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, Product::class);
    }

    /**
     * Create a new Product
     * @link https://help.shopify.com/api/reference/product#create
     * @param  Product $product
     * @return void
     */
    public function create(Product &$product)
    {
        $data = $product->exportData();
        $endpoint = '/admin/products.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'product' => $data
        ));
        $product->setData($response->product);
    }

    /**
     * Modify an existing product
     * @link https://help.shopify.com/api/reference/product#update
     * @param  Product $product
     * @return void
     */
    public function update(Product &$product)
    {
        $data = $product->exportData();
        $endpoint = '/admin/products/'.$product->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'product' => $data
        ));
        $product->setData($response->product);
    }

    /**
     * Remove a producct
     * @link https://help.shopify.com/api/reference/product#destroy
     * @param  Product $product
     * @return void
     */
    public function delete(Product &$product)
    {
        $endpoint = '/admin/products/'.$product->id.'.json';
        $request  = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}
