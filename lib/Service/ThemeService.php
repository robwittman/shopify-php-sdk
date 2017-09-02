<?php

namespace Shopify\Service;

use Shopify\Object\Theme;

class ThemeService extends AbstractService
{
    /**
     * Receive a single theme
     * @link https://help.shopify.com/api/reference/theme#show
     * @param  integer  $themeId
     * @param  array $params
     * @return Theme
     */
    public function get($themeId, array $params = array())
    {
        $request = new Request('GET', '/admin/themes/'.$themeId.'.json');
        return $this->getNode($request, $params, Theme::class);
    }

    /**
     * Receive a list of all themes
     * @link https://help.shopify.com/api/reference/theme#index
     * @param  array $params
     * @return Theme[]
     */
    public function all(array $params = array())
    {
        $request = new Request('GET', '/admin/themes.json');
        return $this->getEdge($request, $params, Theme::class);
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
