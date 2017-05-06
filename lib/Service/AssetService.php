<?php

namespace Shopify\Service;

use Shopify\Object\Asset;
use Shopify\Options\Asset\GetOptions;
use Shopify\Options\Asset\ListOptions;

class AssetService extends AbstractService
{
    /**
     * Receive a list of all assets
     * @link https://help.shopify.com/api/reference/asset#index
     * @param  integer $themeId
     * @param  ListOptions $options
     * @return Asset[]
     */
    public function all($themeId, ListOptions $options = null)
    {

    }

    /**
     * Receive a single asset
     * @link https://help.shopify.com/api/reference/asset#show
     * @param  integer $themeId
     * @param  GetOptions $options
     * @return Article
     */
    public function get($themeId, GetOptions $options = null)
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
