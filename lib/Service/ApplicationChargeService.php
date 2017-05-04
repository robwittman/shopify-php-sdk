<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ApplicationCharge;
use Shopify\Options\ApplicationCharge\GetOptions;
use Shopify\Options\ApplicationCharge\ListOptions;

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
     * @param  GetOptions $options
     * @return ApplicationCharge
     */
    public function get($chargeId, GetOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/application_charges/'.$chargeId.'.json');
        return $this->getNode($request, $params, ApplicationCharge::class);
    }

    /**
     * Retrieve all one-time application charges
     *
     * @link https://help.shopify.com/api/reference/applicationcharge#index
     * @param  ListOptions $options
     * @return ApplicationCharge[]
     */
    public function all(ListOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
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
