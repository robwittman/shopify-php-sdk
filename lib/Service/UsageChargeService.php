<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\UsageCharge;
use Shopify\Options\UsageCharge\GetOptions;
use Shopify\Options\UsageCharge\ListOptions;

class UsageChargeService extends AbstractService
{
    /**
     * Create a usage charges
     * @link https://help.shopify.com/api/reference/usagecharge#create
     * @param integer $recurringApplicationChargeId
     * @param  UsageCharge $usageCharge
     * @return void
     */
    public function create($recurringApplicationChargeId, UsageCharge $usageCharge)
    {
        $data = $usageCharge->exportData();
        $request = $this->createRequest('/admin/recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges.json', static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'usage_charge' => $data
        ));
        $usageCharge->setData($response->usage_charge);
    }

    /**
     * Receive a single usage charge
     * @link https://help.shopify.com/api/reference/usagecharge#show
     * @param  integer $recurringApplicationChargeId
     * @param  integer $usageChargeId
     * @param  GetOptions $options
     * @return UsageCharge
     */
    public function get($recurringApplicationChargeId, $usageChargeId, GetOptions $options = null)
    {
        $request= $this->createRequest('/admin/recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges/'.$usageChargeId.'.json');
        return $this->getNode($request, $options, UsageCharge::class);
    }

    /**
     * Retrieve all usage charges
     * @link https://help.shopify.com/api/reference/usagecharge#index
     * @param  integer $recurringApplicationChargeId
     * @param  ListOptions $options
     * @return UsageCharge[]
     */
    public function all($recurringApplicationChargeId, ListOptions $options = null)
    {
        $request = $this->createRequest('/admin/recurring_application_charges/'.$recurringApplicationChargeId.'/usage_charges.json');
        return $this->getEdge($request, $options, UsageCharge::class);
    }
}
