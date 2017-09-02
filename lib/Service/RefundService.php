<?php

namespace Shopify\Service;

use Shopify\Object\Refund;

class RefundService extends AbstractService
{
    /**
     * Receive a list of all Refunds
     * @link https://help.shopify.com/api/reference/refund#index
     * @param integer $orderId
     * @param  array $params
     * @return Refund[]
     */
    public function all($orderId, array $params = array())
    {
        $request = $this->createRequest('/admin/orders/'.$orderId.'/refunds.json');
        return $this->getEdge($request, $params, Refund::class);
    }

    /**
     * Receive a single Refund
     * @link https://help.shopify.com/api/reference/refund#show
     * @param  integer $orderId
     * @param  integer $refundId
     * @param  array $params
     * @return Refund
     */
    public function get($orderId, $refundId, array $params = array())
    {
        $request= $this->createRequest('/admin/orders/'.$orderId.'/refunds/'.$refundId.'.json');
        return $this->getNode($request, $params, Refund::class);
    }

    /**
     * Create a new refund
     * @link https://help.shopify.com/api/reference/refund#create
     * @param  integer $orderId
     * @param  Refund $refund
     * @return void
     */
    public function create($orderId, Refund &$refund)
    {
        $data= $refund->exportData();
        $request = $this->createRequest('/admin/orders/'.$orderId.'/refunds.json', static::REQUEST_METHOD_POST);
        $response= $this->send($request, array(
            'refund' => $data
        ));
        $refund->setData($response->refund);
    }

    /**
     * Calculate a refund
     * @link https://help.shopify.com/api/reference/refund#calculate
     * @return mixed
     */
    public function calculate()
    {

    }
}
