<?php

namespace Shopify\Service;

use Shopify\Object\Fulfillment;
use Shopify\Options\Fulfillment\GetOptions;
use Shopify\Options\Fulfillment\ListOptions;
use Shopify\Options\Fulfillment\CountOptions;

class FulfillmentService extends AbstractService
{
    public function all($orderId, ListOptions $options = null)
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $options, Fulfillment::class);
    }

    public function count($orderId, CountOptions $options = null)
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    public function get($orderId, $fulfillmentId, GetOptions $options = null)
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $options, Fulfillment::class);
    }

    public function create($orderId, Fulfillment &$fulfillment)
    {
        $data = $fulfillment->exportData();
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'fulfillment' => $data
        ));
        $fulfillment->setData($response->fulfillment);
    }

    public function update($orderId, Fulfillment &$fulfillment)
    {
        $data = $fulfillment->exportData();
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillment->gtId()'.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_PUT);
        $response = $this->send($request, array(
            'fulfillment' => $data
        ));
        $fulfillment->setData($response->fulfillment);
    }

    public function complete($orderId, Fulfillment &$fulfillment)
    {
        $data = $fulfillment->exportData();
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillment->getId().'/complete.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        $fulfillment->setData($response->fulfillment);
    }

    public function cancel($orderId, Fulfillment &$fulfillment)
    {
        $data = $fulfillment->exportData();
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillment->getId().'/cancel.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        $fulfillment->setData($response->fulfillment);
    }

    public function open($orderId, Fulfillment &$fulfillment)
    {
        $data = $fulfillment->exportData();
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillment->getId().'/open.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request);
        $fulfillment->setData($response->fulfillment);
    }
}
