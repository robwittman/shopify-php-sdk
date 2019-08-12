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
        $data = $this->request('application_credits.json', 'GET', $params);
        return $this->createCollection(ApplicationCredit::class, $data['application_credits']);
    }

    /**
     * Receive a single ApplicationCredit
     *
     * @link   https://help.shopify.com/api/reference/applicationcredit#show
     * @param  integer $applicationCreditId
     * @param  array   $fields
     * @return ApplicationCredit
     */
    public function get($applicationCreditId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $endpoint = 'application_credits/'.$applicationCreditId.'.json';
        $data = $this->request($endpoint, 'GET', $params);
        return $this->createObject(ApplicationCredit::class, $data['application_credit']);
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
        $endpoint = 'application_credits.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'application_charge' => $data
            )
        );
        $applicationCredit->setData($response['application_credit']);
    }
}
