<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ApplicationCharge;

class ApplicationChargeService extends AbstractService
{
    /**
     * Create a new one-time application charge
     * https://help.shopify.com/api/reference/abandoned_checkouts#count
     * @param  ApplicationCharge $charge
     * @return boolean
     */
    public function create(ApplicationCharge &$charge)
    {

    }

    /**
     * Receive a single ApplicationCharge
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#show
     * @param  integer $chargeId
     * @return ApplicationCharge
     */
    public function get($chargeId)
    {
        $request = new Request('GET', '/admin/application_charges/'.$chargeId.'.json');
        return $this->getNode($request, [], ApplicationCharge::class);
    }

    /**
     * Retrieve all one-time application charges
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#index
     * @param  array  $params
     * @return ApplicationCharge[]
     */
    public function all(array $params = array())
    {
        $request = new Request('GET', '/admin/application_charges.json');
        return $this->getEdge($request, $params, ApplicationCharge::class);
    }

    /**
     * Activate a one-time application charge
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#activate
     * @param  ApplicationCharge $charge
     * @return boolean
     */
    public function activate(ApplicationCharge &$charge)
    {

    }
}
