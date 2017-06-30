<?php

namespace Shopify\Service;

use Shopify\Object\Collect;
use Shopify\Options\Collect\GetOptions;
use Shopify\Options\Collect\ListOptions;
use Shopify\Options\Collect\CountOptions;

class CollectService extends AbstractService
{
    /**
     * Receive a list of all collects
     * @link https://help.shopify.com/api/reference/collect#index
     * @param  ListOptions $options
     * @return Collect[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/collects.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Collect::class);
    }

    /**
     * Receive a count of all collects
     * @link https://help.shopify.com/api/reference/collect#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $endpoint = '/admin/collects/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single collect
     * @link https://help.shopify.com/api/reference/collect#show
     * @param  integer $collectId
     * @param  GetOptions $options
     * @return Collect
     */
    public function get($collectId, GetOptions $options = null)
    {
        $endpoint = '/admin/collects/'.$collect->getId().'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $options);
    }

    /**
     * Create a new collect
     * @link https://help.shopify.com/api/reference/collect#create
     * @param  Collect $collect
     * @return void
     */
    public function create(Collect &$collect)
    {
        $data = $collect->exportData();
        $enpoint = '/admin/collects.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'collect' => $data
        ));
        $collect->setData($response->collect);
    }

    /**
     * Remove a collect from the database
     * @link https://help.shopify.com/api/reference/collect#destroy
     * @param  Collect $collect
     * @return void
     */
    public function delete(Collect &$collect)
    {
        $endpoint = '/admin/collects/'.$collect->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
        return;
    }
}
