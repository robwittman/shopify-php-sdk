<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Theme;

class ThemeService extends AbstractService
{
    public function get($themeId)
    {
        $request = new Request('GET', '/admin/themes/'.$themeId.'.json');
        return $this->getNode($request, $params, Theme::class);
    }

    public function all(array $params = array())
    {
        $request = new Request('GET', '/admin/themes.json');
        return $this->getEdge($request, $params, Theme::class);
    }

    public function create(Theme $theme)
    {

    }

    public function update(Theme $theme)
    {

    }

    public function delete(Theme $theme)
    {

    }
}
