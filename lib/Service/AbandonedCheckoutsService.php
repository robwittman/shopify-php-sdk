<?php

namespace Shopify\Service;

use Shopify\Object\AbandonedCheckout;
use Shopify\Options\AbandonedCheckout\ListOptions;
use Shopify\Options\AbandonedCheckout\CountOptions;

class AbandonedCheckoutService extends AbstractService
{
    /**
     * List all abandonded checkouts
     *
     * @link https://help.shopify.com/api/reference/abandoned_checkouts#index
     * @param  ListOptions $options
     * @return AbandonedCheckout[]
     */
    public function all(ListOptions $options = null)
    {
        $endpoint = '/admin/checkouts.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, AbandonedCheckout::class);
    }

    /**
     * Get a count of checkouts
     *
     * @link https://help.shopify.com/api/reference/abandoned_checkouts#count
     * @param  CountOptions $options
     * @return integer
     */
    public function count(CountOptions $options = null)
    {
        $endpoint = '/admin/checkouts/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, null);
    }
}
