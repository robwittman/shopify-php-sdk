<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Policy;

class PolicyService extends AbstractService
{
    /**
     * Receive a list of all Policies
     * @link https://help.shopify.com/api/reference/policy#index
     * @return Policy[]
     */
    public function all()
    {
        $endpoint = '/admin/policies.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, null, Policy::class);
    }
}
