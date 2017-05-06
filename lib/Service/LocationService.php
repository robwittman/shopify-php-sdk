<?php

namespace Shopify\Service;

use Shopify\Object\Location;

class LocationService extends AbstractService
{
    /**
     * Get all locations
     * @link https://help.shopify.com/api/reference/location#index
     * @param  ListOptions $options
     * @return Location[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/locations.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Location::class);
    }

    /**
     * Get a single location
     * @link https://help.shopify.com/api/reference/location#show
     * @param  integer $locationId
     * @param  GetOptions $options
     * @return Location
     */
    public function get($locationId, GetOptions $options = null)
    {
        $endpoint = '/admin/locations/'.$locationId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $options, Location::class);
    }
}
