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
        $request = $this->createRequest('/admin/recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges.json', static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'usage_charge' => $data
            )
        );
        $usageCharge->setData($response->usage_charge);
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
        $request= $this->createRequest('/admin/recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges/'.$usageChargeId.'.json');
        return $this->getNode($request, $params, UsageCharge::class);
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
        $request = $this->createRequest('/admin/recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges.json');
        return $this->getEdge($request, $params, UsageCharge::class);
    }
}
