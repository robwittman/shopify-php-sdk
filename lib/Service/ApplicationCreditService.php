<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ApplicationCredit;

class ApplicationCreditService extends AbstractService
{
    /**
     * Create an application credit
     *
     * @link https://help.shopify.com/api/reference/applicationcredit#create
     * @param  ApplicationCredit $credit
     * @return boolean
     */
    public function create(ApplicationCredit &$credit)
    {

    }

    /**
     * Receive a single ApplicationCredit
     *
     * @link  https://help.shopify.com/api/reference/applicationcredit#show
     * @param  integer $creditId
     * @return ApplicationCredit
     */
    public function get($creditId)
    {
        $request = new Request('GET', '/admin/application_credits/'.$creditId.'.json');
        return $this->getNode($request, [], ApplicationCredit::class);
    }

    /**
     * Retrieve all application credits
     *
     * @link https://help.shopify.com/api/reference/applicationcredit#index
     * @param  array  $params
     * @return ApplicationCredit[]
     */
    public function all(array $params = array())
    {
        $request = new Request('GET', '/admin/application_credits.json');
        return $this->getEdge($request, $params, ApplicationCredit::class);
    }
}
