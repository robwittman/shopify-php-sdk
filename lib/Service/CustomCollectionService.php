<?php

namespace Shopify\Service;

use Shopify\Object\CustomCollection;

class CustomCollectionService extends AbstractService
{
    /**
     * Receive a list of all custom collections
     *
     * @link   https://help.shopify.com/api/reference/customcollection#index
     * @param  array $params
     * @return CustomCollection[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/custom_collections.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(CustomCollection::class, $response['custom_collections']);
    }

    /**
     * Receive a count of all custom collections
     *
     * @link   https://help.shopify.com/api/reference/customcollection#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/custom_collections/count.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $response['count'];
    }

    /**
     * Receive a single custom collection
     *
     * @link   https://help.shopify.com/api/reference/customcollection#show
     * @param  integer $customCollectionId
     * @param  array   $fields
     * @return CustomCollection
     */
    public function get($customCollectionId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = $fields;
        }
        $endpoint = '/admin/custom_collections/'.$customCollectionId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(CustomCollection::class, $response['custom_collection']);
    }

    /**
     * Create a new collection
     *
     * @link   https://help.shopify.com/api/reference/customcollection#create
     * @param  CustomCollection $customCollection
     * @return void
     */
    public function create(CustomCollection &$customCollection)
    {
        $data = $customCollection->exportData();
        $endpoint = '/admin/custom_collections.json';
        $response = $this->request($endpoint, 'POST', array(
            'custom_collection' => $data
        ));
        $customCollection->setData($response['custom_collection']);
    }

    /**
     * Update a custom collection
     *
     * @link   https://help.shopify.com/api/reference/customcollection#update
     * @param  CustomCollection $customCollection
     * @return void
     */
    public function update(CustomCollection &$customCollection)
    {
        $data = $customCollection->exportData();
        $endpoint = '/admin/custom_collections/'.$customCollection->id.'.json';
        $response = $this->request($endpoint, 'PUT', array(
            'custom_collection' => $data
        ));
        $customCollection->setData($response['custom_collection']);
    }

    /**
     * Delete a custom collection
     *
     * @link   https://help.shopify.com/api/reference/customcollection#destroy
     * @param  CustomCollection $customCollection
     * @return void
     */
    public function delete(CustomCollection &$customCollection)
    {
        $endpoint = '/admin/custom_collections/'.$customCollection->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
        return;
    }
}
