<?php

namespace Shopify\Service;

use Shopify\Object\Page;
use Shopify\Options\Page\GetOptions;
use Shopify\Options\Page\ListOptions;
use Shopify\Options\Page\CountOptions;

class PageService extends AbstractService
{
    /**
     * Receive a list of all pages
     * @link https://help.shopify.com/api/reference/page#index
     * @param  ListOptions $options
     * @return Page[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/pages.json';
        $request = $this->creatRequest($endpoint);
        return $this->getEdge($request, $options, Page::class);
    }

    /**
     * Receive a count of all pages
     * @link https://help.shopify.com/api/reference/page#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $endpoint = '/admin/pages/count.json';
        $request = $this->creatRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single
     * @link https://help.shopify.com/api/reference/page#show
     * @param  integer $pageId
     * @param  GetOptions $options
     * @return Page
     */
    public function get($pageId, GetOptions $options = null)
    {
        $endpoint = '/admin/pages/'.$pageId.'.json';
        $request = $this->creatRequest($endpoint);
        return $this->getNode($request, $options, Page::class);
    }

    /**
     * Create a new page
     * @link https://help.shopify.com/api/reference/page#create
     * @param  Page   $page
     * @return void
     */
    public function create(Page &$page)
    {
        $data = $page->exportData();
        $endpoint= '/admin/pages.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'page' => $data
        ));
        $page->setData($response->page);
    }

    /**
     * Modify an existing page
     * @link https://help.shopify.com/api/reference/page#update
     * @param  Page   $page
     * @return void
     */
    public function update(Page &$page)
    {
        $data = $page->exportData();
        $endpoint= '/admin/pages/'.$page->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'page' => $data
        ));
        $page->setData($response->page);
    }

    /**
     * Delete an existing page
     * @link https://help.shopify.com/api/reference/page#destroy
     * @param  Page   $page
     * @return void
     */
    public function delete(Page $page)
    {
        $endpoint = '/admin/pages/'.$page->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }
}
