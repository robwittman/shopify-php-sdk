<?php

namespace Shopify\Service;

use Shopify\Object\ApplicationCredit;
use Shopify\Options\ApplicationCredit\GetOptions;
use Shopify\Options\ApplicationCredit\ListOptions;

class ApplicationCreditService extends AbstractService
{
    /**
     * Retrieve all application credits
     *
     * @link https://help.shopify.com/api/reference/applicationcredit#index
     * @param  ListOptions $options
     * @return ApplicationCredit[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/application_credits.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, ApplicationCredit::class);
    }

    /**
     * Receive a single ApplicationCredit
     *
     * @link https://help.shopify.com/api/reference/applicationcredit#show
     * @param  integer $applicationCreditId
     * @param  GetOptions $options
     * @return ApplicationCredit
     */
    public function get($applicationCreditId, GetOptions $options = null)
    {
        $endpoint = '/admin/application_credits/'.$applicationCreditId.'.json';
        $request = $this->createRequest($endpoint);
1        return $this->getNode($request, $options, ApplicationCredit::class);
    }

    /**
     * Create an application credit
     *
     * @link https://help.shopify.com/api/reference/applicationcredit#create
     * @param  ApplicationCredit $applicationCredit
     * @return void
     */
    public function create(ApplicationCredit &$applicationCredit)
    {
        $data = $applicationCredit->exportData();
        $endpoint = '/admin/application_credits.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'application_credit' => $data
        ));
        $applicationCredit->setData($response->application_credit);
    }
}
