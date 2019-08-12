<?php

namespace Shopify\Service;

use Shopify\Object\Theme;

class ThemeService extends AbstractService
{
    /**
     * Receive a single theme
     *
     * @link   https://help.shopify.com/api/reference/theme#show
     * @param  integer $themeId
     * @param  array   $params
     * @return Theme
     */
    public function get($themeId, array $params = [])
    {
        $endpoint = 'themes/'.$themeId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Theme::class, $response['theme']);
    }

    /**
     * Receive a list of all themes
     *
     * @link   https://help.shopify.com/api/reference/theme#index
     * @param  array $params
     * @return Theme[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'themes.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Theme::class, $response['themes']);
    }

    /**
     * Create a new theme
     *
     * @link   https://help.shopify.com/api/reference/theme#create
     * @param  Theme $theme
     * @return void
     */
    public function create(Theme &$theme)
    {
        $data = $theme->exportData();
        $endpoint = 'themes.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'theme' => $data
            )
        );
        $theme->setData($response['theme']);
    }

    /**
     * Update a theme
     *
     * @link   https://help.shopify.com/api/reference/theme#update
     * @param  Theme $theme
     * @return void
     */
    public function update(Theme &$theme)
    {
        $data = $theme->exportData();
        $endpoint = 'themes/'.$theme->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'theme' => $data
            )
        );
        $theme->setData($response['theme']);
    }

    /**
     * Delete a theme
     *
     * @link   https://help.shopify.com/api/reference/theme#destroy
     * @param  Theme $theme
     * @return void
     */
    public function delete(Theme $theme)
    {
        $this->request('themes/'.$theme->id.'.json', 'DELETE');
        return;
    }
}
