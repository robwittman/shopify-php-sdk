<?php

namespace Shopify\Service;

use Shopify\Object\ApplicationCredit;

class ApplicationCreditService extends AbstractService
{
    /**
     * Retrieve all application credits
     *
     * @link   https://help.shopify.com/api/reference/applicationcredit#index
     * @param  array $params
     * @return ApplicationCredit[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/application_credits.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, ApplicationCredit::class);
    }

    /**
     * Receive a single ApplicationCredit
     *
     * @link   https://help.shopify.com/api/reference/applicationcredit#show
     * @param  integer $applicationCreditId
     * @param  array   $params
     * @return ApplicationCredit
     */
    public function get($applicationCreditId, array $params = array())
    {
        $endpoint = '/admin/application_credits/'.$applicationCreditId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, ApplicationCredit::class);
    }

    /**
     * Create an application credit
     *
     * @link   https://help.shopify.com/api/reference/applicationcredit#create
     * @param  ApplicationCredit $applicationCredit
     * @return void
     */
    public function create(ApplicationCredit &$applicationCredit)
    {
        $data = $applicationCredit->exportData();
        $endpoint = '/admin/application_credits.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send(
            $request, array(
            'application_credit' => $data
            )
        );
        $applicationCredit->setData($response->application_credit);
    }
}
