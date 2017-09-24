<?php

namespace Shopify\Service;

use Shopify\Object\Country;

class CountryService extends AbstractService
{
    /**
     * Receive a list of countries
     *
     * @link   https://help.shopify.com/api/reference/country#index
     * @param  array $params
     * @return Country[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/countries.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Country::class, $response['countries']);
    }

    /**
     * Receive a count of all countries
     *
     * @link   https://help.shopify.com/api/reference/country#count
     * @return integer
     */
    public function count()
    {
        $endpoint = '/admin/countries/count.json';
        $response = $this->request($endpoint, 'GET');
        return $response['count'];
    }

    /**
     * Receive a single country
     *
     * @link   https://help.shopify.com/api/reference/country#show
     * @param  integer $countryId
     * @param  array   $fields
     * @return Country
     */
    public function get($countryId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $endpoint = '/admin/countrys/'.$countryId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Country::class, $response['country']);
    }

    /**
     * Create a country
     *
     * @link   https://help.shopify.com/api/reference/country#create
     * @param  Country $country
     * @return void
     */
    public function create(Country &$country)
    {
        $data = $country->exportData();
        $endpoint = '/admin/countries.json';
        $response = $this->request($endpoint, 'POST', array(
            'country' => $data
        ));
        $country->setData($response['country']);
    }

    /**
     * Update a country
     *
     * @link   https://help.shopify.com/api/reference/country#update
     * @param  Country $country
     * @return void
     */
    public function update(Country &$country)
    {
        $data = $country->exportData();
        $endpoint = '/admin/countries/'.$country->id.'.json';
        $response = $this->request($endpoint, 'PUT', array(
            'country' => $data
        ));
        $country->setData($response['country']);
    }

    /**
     * Remove a country
     *
     * @link   https://help.shopify.com/api/reference/country#destroy
     * @param  Country $country
     * @return void
     */
    public function delete(Country $country)
    {
        return $this->request('/admin/countries/'.$country->id.'.json', 'DELETE');
    }
}
