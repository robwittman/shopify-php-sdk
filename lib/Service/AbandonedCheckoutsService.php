<?php

namespace Shopify\Service;

use Shopify\Object\AbandonedCheckout;

class AbandonedCheckoutsService extends AbstractService
{
    /**
     * List all abandonded checkouts
     *
     * @link https://help.shopify.com/api/reference/abandoned_checkouts#index
     * @param  array $params
     * @return AbandonedCheckout[]
     */
    public function all(array $params = array())
    {
        $endpoint = '/admin/checkouts.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, AbandonedCheckout::class);
    }

    /**
     * Get a count of checkouts
     *
     * @link https://help.shopify.com/api/reference/abandoned_checkouts#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $endpoint = '/admin/checkouts/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, null);
    }
}
