<?php

namespace Shopify\Service;

use Shopify\Object\Collect;

class CollectService extends AbstractService
{
    /**
     * Receive a list of all collects
     * @link https://help.shopify.com/api/reference/collect#index
     * @param  array $params
     * @return Collect[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/collects.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Collect::class);
    }

    /**
     * Receive a count of all collects
     * @link https://help.shopify.com/api/reference/collect#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/collects/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single collect
     * @link https://help.shopify.com/api/reference/collect#show
     * @param  integer $collectId
     * @param  array $params
     * @return Collect
     */
    public function get($collectId, array $params = array())
    {
        $endpoint = '/admin/collects/'.$collect->getId().'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params);
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
