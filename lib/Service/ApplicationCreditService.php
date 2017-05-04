<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\ApplicationCredit;
use Shopify\Options\ApplicationCredit\GetOptions;
use Shopify\Options\ApplicationCredit\ListOptions;

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
     * @param  GetOptions $options
     * @return ApplicationCredit
     */
    public function get($creditId, GetOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/application_credits/'.$creditId.'.json');
        return $this->getNode($request, $params, ApplicationCredit::class);
    }

    /**
     * Retrieve all application credits
     *
     * @link https://help.shopify.com/api/reference/applicationcredit#index
     * @param  ListOptions $options
     * @return ApplicationCredit[]
     */
    public function all(ListOptions $options = null)
    {
        $params = is_null($options) ? array() : $options->export();
        $request = new Request('GET', '/admin/application_credits.json');
        return $this->getEdge($request, $params, ApplicationCredit::class);
    }
}
