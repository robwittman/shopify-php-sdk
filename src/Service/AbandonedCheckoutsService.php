<?php

namespace Shopify\Service;

use Shopify\Object\AbandonedCheckout;

class AbandonedCheckoutsService extends AbstractService
{
    /**
     * List all abandoned checkouts
     *
     * @link   https://help.shopify.com/api/reference/abandoned_checkouts#index
     * @param  array $params
     * @return AbandonedCheckout[]
     */
    public function all(array $params = array())
    {
        $data = $this->request('/checkouts.json', 'GET', $params);
        return $this->createCollection(AbandonedCheckout::class, $data['checkouts']);
    }

    /**
     * Get a count of checkouts
     *
     * @link   https://help.shopify.com/api/reference/abandoned_checkouts#count
     * @param  array $params
     * @return integer
     */
    public function count(array $params = array())
    {
        $data = $this->request('/checkouts/count.json', 'GET', $params);
        return $data['count'];
    }
}
