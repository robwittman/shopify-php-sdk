<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Province;
use Shopify\Options\Province\ListOptions;

class ProvinceService extends AbstractService
{
    /**
     * Receive a list of all Provinces
     * @link https://help.shopify.com/api/reference/province#index
     * @param  ListOptions $options
     * @return Province[]
     */
    public function all($countryId, ListOptions $options = null)
    {
        $endpoint = '/admin/countries/'.$countryId.'/provinces.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Province::class);
    }

    /**
     * Receive a count of all Provinces
     * @link https://help.shopify.com/api/reference/province#count
     * @param  integer $countryId
     * @return integer
     */
    public function count($countryId)
    {
        $endpoint = '/admin/countries/'.$countryId.'/provinces/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($endpoint);
    }

    /**
     * Receive a single province
     * @link https://help.shopify.com/api/reference/province#show
     * @param  integer $countryId
     * @param  integer $provinceId
     * @return Province
     */
    public function get($countryId, $provinceId)
    {
        $endpoint = '/admin/countries/'.$countryId.'/provinces/'.$provinceId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, null, Province::class);
    }

    /**
     * Modify an existing province
     * @link https://help.shopify.com/api/reference/province#update
     * @param  Province $province
     * @return void
     */
    public function update($countryId, Province &$province)
    {
        $data = $province->exportData();
        $endpoint = '/admin/countries/'.$countryId.'/provinces/'.$province->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'province' => $data
        ));
        $province->setData($response->province);
    }
}
