<?php

namespace Shopify\Service;

use Shopify\Object\RecurringApplicationCharge;

class RecurringApplicationChargeService extends AbstractService
{
    /**
     * Retrieve all Recurring Application Charges
     * @link https://help.shopify.com/api/reference/recurringapplicationcharge#index
     * @param  array $params
     * @return RecurringApplicationCharge[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/recurring_application_charges.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, RecurringApplicationCharge::class);
    }

    /**
     * Receive a single recurring application charge
     * @link https://help.shopify.com/api/reference/recurringapplicationcharge#show
     * @param  integer $recurringApplicationChargeId
     * @param  array $params
     * @return RecurringApplicationCharge
     */
    public function get($recurringApplicationChargeId, array $params = array())
    {
        $endpoint = '/admin/recurring_application_charges/'.$recurringApplicationChargeId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, RecurringApplicationCharge::class);
    }

    /**
     * Create a new recurring application charge
     * @link https://help.shopify.com/api/reference/recurringapplicationcharge#create
     * @param  RecurringApplicationCharge $recurringApplicationCharge
     * @return void
     */
    public function create(RecurringApplicationCharge &$recurringApplicationCharge)
    {
        $data = $recurringApplicationCharge->exportData();
        $endpoint = '/admin/recurring_application_charges.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'recurring_application_charge' => $data
        ));
        $recurringApplicationCharge->setData($response->recurring_application_charge)
    }

    /**
     * Remove an existing recurring application charge
     * @link https://help.shopify.com/api/reference/recurringapplicationcharge#destroy
     * @param  RecurringApplicationCharge $recurringApplicationCharge
     * @return void
     */
    public function delete(RecurringApplicationCharge $recurringApplicationCharge)
    {
        $endpoint= '/admin/recurring_application_charges/'.$recurringApplicationCharge->getId().'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_DELETE);
        $this->send($request);
    }

    /**
     * Activate a recurring application charge
     * @link https://help.shopify.com/api/reference/recurringapplicationcharge#activate
     * @param  RecurringApplicationCharge $recurringApplicationCharge
     * @return boolean
     */
    public function activate(RecurringApplicationCharge $recurringApplicationCharge)
    {
        $endpoint = '/admin/recurring_application_charges/'.$recurringApplicationCharge->getId().'/activate.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response= $this->send($request);
        $recurringApplicationCharge->setData($response->recurring_application_charge);
    }
}
