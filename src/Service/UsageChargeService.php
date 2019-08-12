<?php

namespace Shopify\Service;

use Shopify\Object\UsageCharge;

class UsageChargeService extends AbstractService
{
    /**
     * Create a usage charges
     *
     * @link   https://help.shopify.com/api/reference/usagecharge#create
     * @param  integer     $recurringApplicationChargeId
     * @param  UsageCharge $usageCharge
     * @return void
     */
    public function create($recurringApplicationChargeId, UsageCharge $usageCharge)
    {
        $data = $usageCharge->exportData();
        $endpoint = 'recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'usage_charge' => $data
            )
        );
        $usageCharge->setData($response['usage_charge']);
    }

    /**
     * Receive a single usage charge
     *
     * @link   https://help.shopify.com/api/reference/usagecharge#show
     * @param  integer $recurringApplicationChargeId
     * @param  integer $usageChargeId
     * @param  array   $params
     * @return UsageCharge
     */
    public function get($recurringApplicationChargeId, $usageChargeId, array $params = array())
    {
        $endpoint = 'recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges/'.$usageChargeId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(UsageCharge::class, $response['usage_charge']);
    }

    /**
     * Retrieve all usage charges
     *
     * @link   https://help.shopify.com/api/reference/usagecharge#index
     * @param  integer $recurringApplicationChargeId
     * @param  array   $params
     * @return UsageCharge[]
     */
    public function all($recurringApplicationChargeId, array $params = array())
    {
        $endpoint = 'recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(UsageCharge::class, $response['usage_charges']);
    }
}
