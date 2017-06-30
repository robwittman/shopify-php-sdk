<?php

namespace Shopify\Service;

use Shopify\Object\CustomCollection;
use Shopify\Options\CustomCollection\GetOptions;
use Shopify\Options\CustomCollection\ListOptions;
use Shopify\Options\CustomCollection\CountOptions;

class CustomCollectionService extends AbstractService
{
    /**
     * Receive a list of all custom collections
     * @link https://help.shopify.com/api/reference/customcollection#index
     * @param  ListOptions $options
     * @return CustomCollection[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/custom_collections.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, CustomCollection::class);
    }

    /**
     * Receive a count of all custom collections
     * @link https://help.shopify.com/api/reference/customcollection#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $endpoint = '/admin/custom_collections/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    /**
     * Receive a single custom collection
     * @link https://help.shopify.com/api/reference/customcollection#show
     * @param  integer  $customCollectionId
     * @param  GetOptions $options
     * @return CustomCollection
     */
    public function get($customCollectionId, GetOptions $options = null)
    {
        $endpoint = '/admin/custom_collections/'.$customCollectionId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $options, CustomCollection::class);
    }

    /**
     * Create a new collection
     * @link https://help.shopify.com/api/reference/customcollection#create
     * @param  CustomCollection $customCollection
     * @return void
     */
    public function create(CustomCollection &$customCollection)
    {
        $data = $customCollection->exportData();
        $endpoint = '/admin/custom_collections.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'custom_collection' => $data
        ));
        $customCollection->setData($response->custom_collection);
    }

    /**
     * Update a custom collection
     * @link https://help.shopify.com/api/reference/customcollection#update
     * @param  CustomCollection $customCollection
     * @return void
     */
    public function update(CustomCollection &$customCollection)
    {
        $data = $customCollection->exportData();
        $endpoint = '/admin/custom_collections/'.$customCollection->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'custom_collection' => $data
        ));
        $customCollection->setData($response->custom_collection);
    }

    /**
     * Delete a custom collection
     * @link https://help.shopify.com/api/reference/customcollection#destroy
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
