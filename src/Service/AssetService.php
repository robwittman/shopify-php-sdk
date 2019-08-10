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
     * @throws ShopifySdkException
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
     * @throws ShopifySdkException
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
     * @throws ShopifySdkException
     */
    public function put($themeId, Asset $asset)
    {
        throw new ShopifySdkException('AssetService::put() not implemented');
    }

    /**
     * Remove an asset from the database
     *
     * @link   https://help.shopify.com/api/reference/asset#destroy
     * @param  integer $themeId
     * @param  Asset   $asset
     * @throws ShopifySdkException
     */
    public function delete($themeId, Asset $asset)
    {
        throw new ShopifySdkException('AssetService::delete() not implemented');
    }
}
