<?php

namespace Shopify\Service;

use Shopify\Object\Asset;
use Shopify\Exception\ShopifySdkException;

class AssetService extends AbstractService
{
    /**
     * Receive a list of all assets
     *
     * @link   https://help.shopify.com/api/reference/asset#index
     * @param  integer $themeId
     * @param  array   $params
     * @return Asset[]
     */
    public function all($themeId, array $params = array())
    {
        throw new ShopifySdkException('AssetService::all() not implemented');
    }

    /**
     * Receive a single asset
     *
     * @link   https://help.shopify.com/api/reference/asset#show
     * @param  integer $themeId
     * @param  array   $params
     * @return Article
     */
    public function get($themeId, array $params = array())
    {
        throw new ShopifySdkException('AssetService::get() not implemented');
    }

    /**
     * Creating or modifying an asset
     *
     * @link   https://help.shopify.com/api/reference/asset#update
     * @param  integer $themeId
     * @param  Asset   $asset
     * @return
     */
    public function put($themeId, Asset $asset)
    {
        throw new ShopifySdkException('AssetService::put() not implemented');
    }
	
	/**
     * Modify an existing asset
     *
     * @link   https://help.shopify.com/en/api/reference/online_store/asset
     * @param  Product $product
     * @return void
     */
    public function update($themeId, Asset $asset)
    {
        $data = $asset->exportData();
        $endpoint = '/admin/themes/'.$themeId.'/assets.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'asset' => $data
            )
        );
        $asset->setData($response['asset']);
    }

    /**
     * Remove an asset from the database
     *
     * @link   https://help.shopify.com/api/reference/asset#destroy
     * @param  integer $themeId
     * @param  Asset   $asset
     * @return void
     */
    public function delete($themeId, Asset $asset)
    {
        throw new ShopifySdkException('AssetService::delete() not implemented');
    }
}
