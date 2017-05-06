<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ProductImage;
use Shopify\Options\ProductImage\GetOptions;
use Shopify\Options\ProductImage\ListOptions;
use Shopify\Options\ProductImage\CountOptions;

class ProductImageService extends AbstractService
{
    /**
     * Receive a list of all product images
     * @link https://help.shopify.com/api/reference/product_image#index
     * @param  integer $productId
     * @param  ListOptions $options
     * @return ProductImage[]
     */
    public function all($productId, ListOptions $options = null)
    {
        $endpoint= '/admin/products/'.$productId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, ProductImage::class);
    }

    /**
     * Receive a count of all Product Images
     * @link https://help.shopify.com/api/reference/product_image#count
     * @param  integer $productId
     * @param  CountOptions $options
     * @return integer
     */
    public function count($productId, CountOptions $options = null)
    {
        $endpoint = '/admin/products/'.$productId.'/images/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Get a single product image
     * @link https://help.shopify.com/api/reference/product_image#show
     * @param  integer $productId
     * @param  integer $productImageId
     * @param  GetOptions $options
     * @return ProductImage
     */
    public function get($productId, $productImageId, GetOptions $options = null)
    {
        $endpoint = '/admin/products/'.$productId.'/images/'.$productImageId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($endpoint, $options, ProductImage::class);
    }

    /**
     * Create a new product Image
     * @link https://help.shopify.com/api/reference/product_image#create
     * @param  integer        $productId
     * @param  ProductImage $productImage
     * @return void
     */
    public function create($productId, ProductImage &$productImage)
    {
        $data = $productImage->exportData();
        $endpoint = '/admin/products/'.$productId.'/images.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'image' => $data
        ));
        $productImage->setData($response->image);
    }

    /**
     * Modify an existing product image
     * @link https://help.shopify.com/api/reference/product_image#update
     * @param  integer        $productId
     * @param  ProductImage $productImage
     * @return void
     */
    public function update($productId, ProductImage &$productImage)
    {
        $data = $productImage->exportData();
        $endpoint = '/admin/products/'.$productId.'/images/'.$productImage->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'image' => $data
        ));
        $productImage->setData($response->image);
    }

    /**
     * Delete a product image
     * @link https://help.shopify.com/api/reference/product_image#destroy
     * @param  integer       $productId
     * @param  ProductImage $productImage
     * @return void
     */
    public function delete($productId, ProductImage $productImage)
    {
        $endpoint = '/admin/products/'.$productId.'/images/'.$productImage->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}
