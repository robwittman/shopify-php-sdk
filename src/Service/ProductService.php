<?php

namespace Shopify\Service;

use Shopify\Object\Product;

class ProductService extends AbstractService
{
    /**
     * Receive a lists of all Products
     *
     * @link   https://help.shopify.com/api/reference/product#index
     * @param  array $params
     * @return Product[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'products.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Product::class, $response['products']);
    }

    /**
     * Receive a count of all Products
     *
     * @link   https://help.shopify.com/api/reference/product#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = [])
    {
        $endpoint = 'products/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a single product
     *
     * @link   https://help.shopify.com/api/reference/product#show
     * @param  integer $productId
     * @param  array   $fields
     * @return Product
     */
    public function get($productId, array $fields = [])
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = $fields;
        }
        $endpoint = 'products/'.$productId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Product::class, $response['product']);
    }

    /**
     * Create a new Product
     *
     * @link   https://help.shopify.com/api/reference/product#create
     * @param  Product $product
     * @return void
     */
    public function create(Product &$product)
    {
        $data = $product->exportData();
        $endpoint = 'products.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'product' => $data
            )
        );
        $product->setData($response['product']);
    }

    /**
     * Modify an existing product
     *
     * @link   https://help.shopify.com/api/reference/product#update
     * @param  Product $product
     * @return void
     */
    public function update(Product &$product)
    {
        $data = $product->exportData();
        $endpoint = 'products/'.$product->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'product' => $data
            )
        );
        $product->setData($response['product']);
    }

    /**
     * Remove a product
     *
     * @link   https://help.shopify.com/api/reference/product#destroy
     * @param  Product $product
     * @return void
     */
    public function delete(Product &$product)
    {
        $endpoint = 'products/'.$product->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }
}
