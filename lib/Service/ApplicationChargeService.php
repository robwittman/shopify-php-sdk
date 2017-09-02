<?php

namespace Shopify\Service;

use Shopify\Object\ApplicationCharge;

class ApplicationChargeService extends AbstractService
{
    /**
     * Retrieve all one-time application charges
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#index
     * @param  array $params
     * @return ApplicationCharge[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/application_charges.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, ApplicationCharge::class);
    }

    /**
     * Receive a single ApplicationCharge
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#show
     * @param  integer $applicationChargeId
     * @param  array $params
     * @return ApplicationCharge
     */
    public function get($applicationChargeId, array $params = array())
    {
        $endpoint = '/admin/application_charges/'.$applicationChargeId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, ApplicationCharge::class);
    }

    /**
     * Create a new one-time application charge
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#create
     * @param  ApplicationCharge $applicationCharge
     * @return void
     */
    public function create(ApplicationCharge &$applicationCharge)
    {
        $data = $applicationCharge->exportData();
        $endpoint = '/admin/application_charges.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'application_charge' => $data
        ));
        $applicationCharge->setData($response->application_charge);
    }

    /**
     * Activate a one-time application charge
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#activate
     * @param  ApplicationCharge $applicationCharge
     * @return void
     */
    public function activate(ApplicationCharge &$applicationCharge)
    {
        $data = $applicationCharge->exportData();
        $endpoint = '/admin/application_charges/'.$applicationCharge->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        $applicationCharge->setData($response->application_charge);
    }
}
