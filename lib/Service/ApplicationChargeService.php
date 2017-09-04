<?php

namespace Shopify\Service;

use Shopify\Object\ApplicationCharge;

class ApplicationChargeService extends AbstractService
{
    /**
     * Retrieve all one-time application charges
     *
     * @link   https://help.shopify.com/api/reference/applicationcharge#index
     * @param  array $params
     * @return ApplicationCharge[]
     */
    public function all(array $params = array())
    {
        $data = $this->request('/admin/application_charges.json', 'GET', $params);
        return $this->createCollection(ApplicationCharge::class, $data['application_charges']);
    }

    /**
     * Receive a single ApplicationCharge
     *
     * @link   https://help.shopify.com/api/reference/applicationcharge#show
     * @param  integer $applicationChargeId
     * @param  array   $fields
     * @return ApplicationCharge
     */
    public function get($applicationChargeId, array $fields = array())
    {
        $params = array();
        if (!empty($fields)) {
            $params['fields'] = implode(',', $fields);
        }
        $data = $this->request('/admin/application_charges/'.$applicationChargeId.'.json', 'GET', $params);
        return $this->createObject(ApplicationCharge::class, $data['application_charge']);
    }

    /**
     * Create a new one-time application charge
     *
     * @link   https://help.shopify.com/api/reference/applicationcharge#create
     * @param  ApplicationCharge $applicationCharge
     * @return void
     */
    public function create(ApplicationCharge &$applicationCharge)
    {
        $data = $applicationCharge->exportData();
        $endpoint = '/admin/application_charges.json';
        $response = $this->request('/admin/application_charges.json', 'POST', array(
            'application_charge' => $data
        ));
        $applicationCharge->setData($response['application_charge']);
    }

    /**
     * Activate a one-time application charge
     *
     * @link   https://help.shopify.com/api/reference/applicationcharge#activate
     * @param  ApplicationCharge $applicationCharge
     * @return void
     */
    public function activate(ApplicationCharge &$applicationCharge)
    {
        $response = $this->request('/admin/application_charges/'.$applicationCharge->id.'/activate.json', 'POST');
        $applicationCharge->setData($response['application_charge']);
    }
}
