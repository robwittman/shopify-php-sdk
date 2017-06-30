<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Theme;
use Shopify\Options\Theme\GetOptions;
use Shopify\Options\Theme\ListOptions;

class ThemeService extends AbstractService
{
    /**
     * Receive a single theme
     * @link https://help.shopify.com/api/reference/theme#show
     * @param  integer  $themeId
     * @param  GetOptions $options
     * @return Theme
     */
    public function get($themeId, GetOptions $options = null)
    {
        $request = new Request('GET', '/admin/themes/'.$themeId.'.json');
        return $this->getNode($request, $options, Theme::class);
    }

    /**
     * Receive a list of all themes
     * @link https://help.shopify.com/api/reference/theme#index
     * @param  ListOptions $options
     * @return Theme[]
     */
    public function all(ListOptions $options = null)
    {
        $request = new Request('GET', '/admin/themes.json');
        return $this->getEdge($request, $options, Theme::class);
    }

    /**
     * Create a new theme
     * @link https://help.shopify.com/api/reference/theme#create
     * @param  Theme  $theme
     * @return void
     */
    public function create(Theme &$theme)
    {
        $data = $theme->exportData();
        $request = $this->createRequest('/admin/themes.json', static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'theme' => $data
        ));
        $theme->setData($response->theme);
    }

    /**
     * Update a theme
     * @link https://help.shopify.com/api/reference/theme#update
     * @param  Theme  $theme
     * @return void
     */
    public function update(Theme &$theme)
    {
        $data = $theme->exportData();
        $request = $this->createRequest('/admin/themes/'.$theme->getId()'.json', static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'theme' => $data
        ));
        $theme->setData($response->theme);
    }

    /**
     * Delete a theme
     * @link https://help.shopify.com/api/reference/theme#destroy
     * @param  Theme  $theme
     * @return void
     */
    public function delete(Theme $theme)
    {
        $request = $this->createRequest('/admin/themes/'.$theme->getId().'.json', static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}
