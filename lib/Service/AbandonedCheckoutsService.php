<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
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
        $params = is_null($options) ? array() : $options->export();
        $endpoint = '/admin/checkouts.json';
        $request = new Request("GET", $endpoint);
        return $this->getEdge($request, $params, AbandonedCheckout::class);
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
        $params = is_null($options) ? array() : $options->export();
        $endpoint = '/admin/checkouts/count.json';
        $request = new Request("GET", $endpoint);
        return $this->getEdge($request, $params, null);
    }
}
