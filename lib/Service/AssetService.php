<?php
<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Asset;
use Shopify\Options\Asset\ListOptions;
use Shopify\Options\Asset\GetOptions;

class AssetService extends AbstractService
{
    public function get($themeId, GetOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/themes/'.$themeId.'/assets.json');
        return $this->getNode($request, $params, Asset::class);
    }

    public function all($themeId, ListOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/themes/'.$themeId.'/assets.json');
        return $this->getEdge($request, $params, Asset::class);
    }
}
