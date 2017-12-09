<?php

namespace Shopify\Service;

use Shopify\Object\ProductVariant;

class ProductVariantService extends AbstractService
{
    /**
     * Receive a list of Product Variants
     *
     * @link   https://help.shopify.com/api/reference/product_variant#index
     * @param  integer $productId
     * @param  array   $params
     * @return ProductVariant[]
     */
    public function all($productId, array $params = array())
    {
        $endpoint = '/admin/products/'.$productId.'/variants.json';
        $request = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(ProductVariant::class, $response['variants']);
    }

    /**
     * Receive a count of all Variant
     *
     * @link   https://help.shopify.com/api/reference/product_variant#count
     * @param  integer $productId
     * @return integer
     */
    public function count($productId)
    {
        $response = $this->request('/admin/products/'.$productId.'/count.json', 'GET');
        return $response['count'];
    }

    /**
     * Receive a single product variant
     *
     * @link   https://help.shopify.com/api/reference/product_variant#show
     * @param  integer $productVariantId
     * @param  array   $fields
     * @return ProductVariant
     */
    public function get($productVariantId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = $fields;
        }
        $endpoint = '/admin/variants/'.$productVariantId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(ProductVariant::class, $response['variant']);
    }

    /**
     * Create a new product variant
     *
     * @link   https://help.shopify.com/api/reference/product_variant#create
     * @param  integer        $productId
     * @param  ProductVariant $productVariant
     * @return void
     */
    public function create($productId, ProductVariant &$productVariant)
    {
        $data = $productVariant->exportData();
        $endpoint = '/admin/products/'.$productId.'/variants.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'variant' => $data
            )
        );
        $productVariant->setData($response['variant']);
    }

    /**
     * Modify an existing product variant
     *
     * @link   https://help.shopify.com/api/reference/product_variant#update
     * @param  ProductVariant $productVariant
     * @return void
     */
    public function update(ProductVariant &$productVariant)
    {
        $data = $productVariant->exportData();
        $endpoint = '/admin/variants/'.$productVariant->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'variant' => $data
            )
        );
        $productVariant->setData($response['variant']);
    }

    /**
     * Delete a product variant
     *
     * @link   https://help.shopify.com/api/reference/product_variant#destroy
     * @param  integer        $productId
     * @param  ProductVariant $productVariant
     * @return void
     */
    public function delete($productId, ProductVariant &$productVariant)
    {
        $endpoint = '/admin/products/'.$productId.'/variants/'.$productVariant->id.'.json';
        $response = $this->request($endpoint, 'DELETE');
    }
}
