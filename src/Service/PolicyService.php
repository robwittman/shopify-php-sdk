<?php

namespace Shopify\Service;

use Shopify\Object\Policy;

class PolicyService extends AbstractService
{
    /**
     * Receive a list of all Policies
     *
     * @link   https://help.shopify.com/api/reference/policy#index
     * @return Policy[]
     */
    public function all()
    {
        $endpoint = '/policies.json';
        $response = $this->request($endpoint);
        return $this->createCollection(Policy::class, $response['policies']);
    }
}
