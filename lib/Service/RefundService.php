<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\Refund;
use Shopify\Options\Refund\GetOptions;
use Shopify\Options\Refund\ListOptions;

class RefundService extends AbstractService
{
    /**
     * Receive a list of all Refunds
     * @link https://help.shopify.com/api/reference/refund#index
     * @param integer $orderId
     * @param  ListOptions $options
     * @return Refund[]
     */
    public function all($orderId, ListOptions $options = null)
    {
        $request = $this->createRequest('/admin/orders/'.$orderId.'/refunds.json');
        return $this->getEdge($request, $options, Refund::class);
    }

    /**
     * Receive a single Refund
     * @link https://help.shopify.com/api/reference/refund#show
     * @param  integer $orderId
     * @param  integer $refundId
     * @param  GetOptions $options
     * @return Refund
     */
    public function get($orderId, $refundId, GetOptions $options = null)
    {
        $request= $this->createRequest('/admin/orders/'.$orderId.'/refunds/'.$refundId.'.json');
        return $this->getNode($request, $options, Refund::class);
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
