<?php

namespace Shopify\Service;

use Shopify\Object\Page;

class PageService extends AbstractService
{
    /**
     * Receive a list of all pages
     *
     * @link   https://help.shopify.com/api/reference/page#index
     * @param  array $params
     * @return Page[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'pages.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Page::class, $response['pages']);
    }

    /**
     * Receive a count of all pages
     *
     * @link   https://help.shopify.com/api/reference/page#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = [])
    {
        $endpoint = 'pages/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a single
     *
     * @link   https://help.shopify.com/api/reference/page#show
     * @param  integer $pageId
     * @param  array   $params
     * @return Page
     */
    public function get($pageId, array $params = [])
    {
        $endpoint = 'pages/'.$pageId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Page::class, $response['page']);
    }

    /**
     * Create a new page
     *
     * @link   https://help.shopify.com/api/reference/page#create
     * @param  Page $page
     * @return void
     */
    public function create(Page &$page)
    {
        $data = $page->exportData();
        $endpoint = 'pages.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'page' => $data
            )
        );
        $page->setData($response['page']);
    }

    /**
     * Modify an existing page
     *
     * @link   https://help.shopify.com/api/reference/page#update
     * @param  Page $page
     * @return void
     */
    public function update(Page &$page)
    {
        $data = $page->exportData();
        $endpoint = 'pages/'.$page->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'page' => $data
            )
        );
        $page->setData($response['page']);
    }

    /**
     * Delete an existing page
     *
     * @link   https://help.shopify.com/api/reference/page#destroy
     * @param  Page $page
     * @return void
     */
    public function delete(Page $page)
    {
        $endpoint = 'pages/'.$page->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }
}
