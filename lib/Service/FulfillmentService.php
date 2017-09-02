<?php

namespace Shopify\Service;

use Shopify\Object\Fulfillment;

class FulfillmentService extends AbstractService
{
    public function all($orderId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments.json';
        $request = $this->createRequest($endpoint);
        return $this->getEdge($request, $params, Fulfillment::class);
    }

    public function count($orderId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/count.json';
        $request = $this->createRequest($endpoint);
        return $this->getCount($request, $options);
    }

    public function get($orderId, $fulfillmentId, array $params = array())
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, $params, Fulfillment::class);
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
