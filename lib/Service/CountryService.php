<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Country;
use Shopify\Options\Country\GetOptions;
use Shopify\Options\Country\ListOptions;

class CountryService extends AbstractService
{
    /**
     * Receive a list of countries
     * @link https://help.shopify.com/api/reference/country#index
     * @param  ListOptions $options
     * @return Country[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/countries.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Country::class);
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
     * @param  GetOptions $options
     * @return Country
     */
    public function get($countryId, GetOptions $options = null)
    {
        $endpoint = '/admin/countries/'.$countryId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $options, Country::class);
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
