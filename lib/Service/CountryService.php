<?php

namespace Shopify\Service;

use Shopify\Object\Country;

class CountryService extends AbstractService
{
    /**
     * Receive a list of countries
     * @link https://help.shopify.com/api/reference/country#index
     * @param  array $params
     * @return Country[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/countries.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Country::class);
    }

    /**
     * Receive a count of all countries
     * @link https://help.shopify.com/api/reference/country#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/admin/countries/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request);
    }

    /**
     * Receive a single country
     * @link https://help.shopify.com/api/reference/country#show
     * @param  integer $countryId
     * @param  array $params
     * @return Country
     */
    public function get($countryId, array $params = array())
    {
        $endpoint = '/admin/countries/'.$countryId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, Country::class);
    }

    /**
     * Create a country
     * @link https://help.shopify.com/api/reference/country#create
     * @param  Country $country
     * @return void
     */
    public function create(Country &$country)
    {
        $data = $country->exportData();
        $endpoint = '/admin/countries.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'country' => $data
        ));
        $country->setData($response->country);
    }

    /**
     * Update a country
     * @link https://help.shopify.com/api/reference/country#update
     * @param  Country $country
     * @return void
     */
    public function update(Country &$country)
    {
        $data = $country->exportData();
        $endpoint = '/admin/countries/'.$country->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'country' => $data
        ));
        $country->setData($response->country);
    }

    /**
     * Remove a country
     * @link https://help.shopify.com/api/reference/country#destroy
     * @param  Country $country
     * @return void
     */
    public function delete(Country $country)
    {
        $endpoint = '/admin/countries/'.$country->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
        return;
    }
}
