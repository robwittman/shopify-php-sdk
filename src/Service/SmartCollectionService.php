<?php

namespace Shopify\Service;

use Shopify\Object\SmartCollection;

class SmartCollectionService extends AbstractService
{
    /**
     * Receive a list of all SmartCollection
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#index
     * @param  array $params
     * @return SmartCollection[]
     */
    public function all(array $params = [])
    {
        $endpoint = '/smart_collections.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(SmartCollection::class, $response['smart_collections']);
    }

    /**
     * Receive a count of smart collections
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/smart_collections/count.json';
        $response = $this->request($endpoint);
        return $response['count'];
    }

    /**
     * Receive a single smart collection
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#show
     * @param  integer $smartCollectionId
     * @param  array   $params
     * @return SmartCollection
     */
    public function get($smartCollectionId, array $params = [])
    {
        $endpoint = '/smart_collections/'.$smartCollectionId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(SmartCollection::class, $response['smart_collection']);
    }

    /**
     * Create a new smart collection
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#create
     * @param  SmartCollection $smartCollection
     * @return void
     */
    public function create(SmartCollection &$smartCollection)
    {
        $data = $smartCollection->exportData();
        $endpoint = '/smart_collections.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'smart_collection' => $data
            )
        );
        $smartCollection->setData($response['smart_collection']);
    }

    /**
     * Modify an existing smart collection
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#update
     * @param  SmartCollection $smartCollection
     * @return void
     */
    public function update(SmartCollection &$smartCollection)
    {
        $data = $smartCollection->exportData();
        $endpoint = '/smart_collections/'.$smartCollection->getId().'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'smart_collection' => $data
            )
        );
        $smartCollection->setData($response['smart_collection']);
    }

    /**
     * Delete an existing smart_collection
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#destroy
     * @param  SmartCollection $smartCollection
     * @return void
     */
    public function delete(SmartCollection $smartCollection)
    {
        $request = $this->createRequest('/smart_collections/'.$smartCollection->getId().'.json', static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }

    /**
     * Set the ordering type or manual order of products
     *
     * @link   https://help.shopify.com/api/reference/smartcollection#order
     * @param  integer      $smartCollectionId
     * @param  OrderOptions $options
     * @throws ShopifySdkException
     */
    public function order($smartCollectionId, OrderOptions $options)
    {
        throw new ShopifySdkException("SmartCollectionService::order not implemented");
    }
}
