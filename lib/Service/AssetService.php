<?php

namespace Shopify\Service;

use Shopify\Object\Asset;

class AssetService extends AbstractService
{
    /**
     * Receive a list of all assets
     * @link https://help.shopify.com/api/reference/asset#index
     * @param  integer $themeId
     * @param  array $params
     * @return Asset[]
     */
    public function all($themeId, array $params = array())
    {

    }

    /**
     * Receive a single asset
     * @link https://help.shopify.com/api/reference/asset#show
     * @param  integer $themeId
     * @param  array $params
     * @return Article
     */
    public function get($themeId, array $params = array())
    {

    }

    /**
     * Creating or modifying an asset
     * @link https://help.shopify.com/api/reference/asset#update
     * @param  integer $themeId
     * @param  Asset  $asset
     * @return
     */
    public function put($themeId, Asset $asset)
    {

    }

    /**
     * Remove an asset from the database
     * @link https://help.shopify.com/api/reference/asset#destroy
     * @param  integer $themeId
     * @param  Asset  $asset
     * @return void
     */
    public function delete($themeId, Asset $asset)
    {

    }
}
