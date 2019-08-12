<?php

namespace Shopify\Service;

use Shopify\Object\RecurringApplicationCharge;

class RecurringApplicationChargeService extends AbstractService
{
    /**
     * Retrieve all Recurring Application Charges
     *
     * @link   https://help.shopify.com/api/reference/recurringapplicationcharge#index
     * @param  array $params
     * @return RecurringApplicationCharge[]
     */
    public function all(array $params = [])
    {
        $endpoint = 'recurring_application_charges.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(RecurringApplicationCharge::class, $response['recurring_application_charges']);
    }

    /**
     * Receive a single recurring application charge
     *
     * @link   https://help.shopify.com/api/reference/recurringapplicationcharge#show
     * @param  integer $recurringApplicationChargeId
     * @param  array   $params
     * @return RecurringApplicationCharge
     */
    public function get($recurringApplicationChargeId, array $params = [])
    {
        $endpoint = 'recurring_application_charges/'.$recurringApplicationChargeId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(RecurringApplicationCharge::class, $response['recurring_application_charge']);
    }

    /**
     * Create a new recurring application charge
     *
     * @link   https://help.shopify.com/api/reference/recurringapplicationcharge#create
     * @param  RecurringApplicationCharge $recurringApplicationCharge
     * @return void
     */
    public function create(RecurringApplicationCharge &$recurringApplicationCharge)
    {
        $data = $recurringApplicationCharge->exportData();
        $endpoint = 'recurring_application_charges.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'recurring_application_charge' => $data
            )
        );
        $recurringApplicationCharge->setData($response['recurring_application_charge']);
    }

    /**
     * Remove an existing recurring application charge
     *
     * @link   https://help.shopify.com/api/reference/recurringapplicationcharge#destroy
     * @param  RecurringApplicationCharge $recurringApplicationCharge
     * @return void
     */
    public function delete(RecurringApplicationCharge $recurringApplicationCharge)
    {
        $endpoint= '/recurring_application_charges/'.$recurringApplicationCharge->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }

    /**
     * Activate a recurring application charge
     *
     * @link   https://help.shopify.com/api/reference/recurringapplicationcharge#activate
     * @param  RecurringApplicationCharge $recurringApplicationCharge
     * @return void
     */
    public function activate(RecurringApplicationCharge $recurringApplicationCharge)
    {
        $endpoint = 'recurring_application_charges/'.$recurringApplicationCharge->id.'/activate.json';
        $response = $this->request($endpoint, 'POST');
        $recurringApplicationCharge->setData($response['recurring_application_charge']);
    }
}
