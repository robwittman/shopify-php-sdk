<?php

namespace Shopify\Service;

use Shopify\Object\Location;

class LocationService extends AbstractService
{
    /**
     * Get all locations
     * @link https://help.shopify.com/api/reference/location#index
     * @param  array $params
     * @return Location[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/locations.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Location::class);
    }

    /**
     * Get a single location
     * @link https://help.shopify.com/api/reference/location#show
     * @param  integer $locationId
     * @param  array $params
     * @return Location
     */
    public function get($locationId, array $params = array())
    {
        $endpoint = '/admin/locations/'.$locationId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, Location::class);
    }
}
