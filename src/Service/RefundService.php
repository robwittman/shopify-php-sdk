<?php

namespace Shopify\Service;

use Shopify\Object\Refund;
use Shopify\Exception\ShopifySdkException;

class RefundService extends AbstractService
{
    /**
     * Receive a list of all Refunds
     *
     * @link   https://help.shopify.com/api/reference/refund#index
     * @param  integer $orderId
     * @param  array   $params
     * @return Refund[]
     */
    public function all($orderId, array $params = array())
    {
        $endpoint = '/orders/'.$orderId.'/refunds.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createCollection(Refund::class, $response['refunds']);
    }

    /**
     * Receive a single Refund
     *
     * @link   https://help.shopify.com/api/reference/refund#show
     * @param  integer $orderId
     * @param  integer $refundId
     * @param  array   $params
     * @return Refund
     */
    public function get($orderId, $refundId, array $params = array())
    {
        $endpoint = '/orders/'.$orderId.'/refunds/'.$refundId.'.json';
        $response = $this->request($endpoint, 'GET', $params);
        return $this->createObject(Refund::class, $response['refund']);
    }

    /**
     * Create a new refund
     *
     * @link   https://help.shopify.com/api/reference/refund#create
     * @param  integer $orderId
     * @param  Refund  $refund
     * @return void
     */
    public function create($orderId, Refund &$refund)
    {
        $data = $refund->exportData();
        $endpoint = '/orders/'.$orderId.'/refunds.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'refund' => $data
            )
        );
        $refund->setData($response['refund']);
    }

    /**
     * Calculate a refund
     *
     * @link   https://help.shopify.com/api/reference/refund#calculate
     * @return mixed
     */
    public function calculate()
    {
        throw new ShopifySdkException(
            "RefundService::calculate() not implemented"
        );
    }
}
