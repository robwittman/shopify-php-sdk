<?php
<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Asset;

class AssetService extends AbstractService
{
    public function get($themeId, array $params = array())
    {
        $request = new Request('GET', '/admin/themes/'.$themeId.'/assets.json');
        return $this->getNode($request, $params, Asset::class);
    }

    public function all($themeId, array $params = array())
    {
        $request = new Request('GET', '/admin/themes/'.$themeId.'/assets.json');
        return $this->getEdge($request, $params, Asset::class);
    }
}
