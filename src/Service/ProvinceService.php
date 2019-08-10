<?php

namespace Shopify\Service;

use Shopify\Object\Province;

class ProvinceService extends AbstractService
{
    /**
     * Receive a list of all Provinces
     *
     * @link   https://help.shopify.com/api/reference/province#index
     * @param  integer $countryId
     * @param  array $params
     * @return Province[]
     */
    public function all($countryId, array $params = array())
    {
        $endpoint = '/countries/'.$countryId.'/provinces.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Province::class, $response['provinces']);
    }

    /**
     * Receive a count of all Provinces
     *
     * @link   https://help.shopify.com/api/reference/province#count
     * @param  integer $countryId
     * @return integer
     */
    public function count($countryId)
    {
        $endpoint = '/countries/'.$countryId.'/provinces/count.json';
        $response = $this->request($endpoint);
        return $response['count'];
    }

    /**
     * Receive a single province
     *
     * @link   https://help.shopify.com/api/reference/province#show
     * @param  integer $countryId
     * @param  integer $provinceId
     * @return Province
     */
    public function get($countryId, $provinceId)
    {
        $endpoint = '/countries/'.$countryId.'/provinces/'.$provinceId.'.json';
        $response = $this->request($endpoint);
        return $this->createObject(Province::class, $response['province']);
    }

    /**
     * Modify an existing province
     *
     * @link   https://help.shopify.com/api/reference/province#update
     * @param  integer $countryId
     * @param  Province $province
     * @return void
     */
    public function update($countryId, Province &$province)
    {
        $data = $province->exportData();
        $endpoint = '/countries/'.$countryId.'/provinces/'.$province->id.'.json';
        $response = $this->request(
            $endpoint, 'PUT', array(
            'province' => $data
            )
        );
        $province->setData($response['province']);
    }
}
