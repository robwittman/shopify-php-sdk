<?php

namespace Shopify\Service;

use Shopify\Object\ProductImage;

class ProductImageService extends AbstractService
{
    /**
     * Receive a list of all product images
     *
     * @link   https://help.shopify.com/api/reference/product_image#index
     * @param  integer $productId
     * @param  array   $params
     * @return ProductImage[]
     */
    public function all($productId, array $params = [])
    {
        $endpoint=  '/products/'.$productId.'/images.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(ProductImage::class, $response['images']);
    }

    /**
     * Receive a count of all Product Images
     *
     * @link   https://help.shopify.com/api/reference/product_image#count
     * @param  integer $productId
     * @param  array   $params
     * @return integer
     */
    public function count($productId, array $params = [])
    {
        $endpoint = 'products/'.$productId.'/images/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Get a single product image
     *
     * @link  https://help.shopify.com/api/reference/product_image#show
     * @param integer $productId
     * @param integer $productImageId
     *
     * @return ProductImage
     */
    public function get($productId, $productImageId)
    {
        $endpoint = 'products/'.$productId.'/images/'.$productImageId.'.json';
        $response = $this->request($endpoint, 'GET');
        return $this->createObject(ProductImage::class, $response['image']);
    }

    /**
     * Create a new product Image
     *
     * @link   https://help.shopify.com/api/reference/product_image#create
     * @param  integer      $productId
     * @param  ProductImage $productImage
     * @return void
     */
    public function create($productId, ProductImage &$productImage)
    {
        $data = $productImage->exportData();
        $endpoint = 'products/'.$productId.'/images.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'image' => $data
            )
        );
        $productImage->setData($response['image']);
    }

    /**
     * Modify an existing product image
     *
     * @link   https://help.shopify.com/api/reference/product_image#update
     * @param  integer      $productId
     * @param  ProductImage $productImage
     * @return void
     */
    public function update($productId, ProductImage &$productImage)
    {
        $data = $productImage->exportData();
        $endpoint = 'products/'.$productId.'/images/'.$productImage->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'image' => $data
            )
        );
        $productImage->setData($response['image']);
    }

    /**
     * Delete a product image
     *
     * @link   https://help.shopify.com/api/reference/product_image#destroy
     * @param  integer      $productId
     * @param  ProductImage $productImage
     * @return void
     */
    public function delete($productId, ProductImage $productImage)
    {
        $endpoint = 'products/'.$productId.'/images/'.$productImage->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }
}
