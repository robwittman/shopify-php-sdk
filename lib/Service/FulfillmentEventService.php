<?php

namespace Shopify\Service;

use Shopify\Object\FulfillmentEvent;

class FulfillmentEventService extends AbstractService
{
    /**
     * Receive a list of all fulfillmen events
     * @link https://help.shopify.com/api/reference/fulfillmentevent#index
     * @param  integer $orderId
     * @param  integer $fulfillmentId
     * @return FulfillmentEvent[]
     */
    public function all($orderId, $fulfillmentId)
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events.json';
        $request  = $this->createRequest($endpoint);
        return $this->getEdge($request, array(), FulfillmentEvent::class);
    }

    /**
     * Get a specific fulfillment event
     * @link https://help.shopify.com/api/reference/fulfillmentevent#show
     * @param  integer $orderId
     * @param  integer $fulfillmentId
     * @param  integer $fulfillmentEventId
     * @return FulfillmentEvent
     */
    public function get($orderId, $fulfillmentId, $fulfillmentEventId)
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events/'.$fulfillmentEventId.'.json';
        $request = $this->createRequest($endpoint);
        return $this->getNode($request, array(), FulfillmentEvent::class);
    }

    /**
     * Create a fulfillment event
     * @link https://help.shopify.com/api/reference/fulfillmentevent#create
     * @param  integer           $orderId
     * @param  integer           $fulfillmentId
     * @param  FulfillmentEvent $fulfillmentEvent
     * @return void
     */
    public function create($orderId, $fulfillmentId, FulfillmentEvent &$fulfillmentEvent)
    {
        $data = $fulfillmentEvent->exportData();
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events.json';
        $request = $this->createRequest($endpoint, static::REQUEST_METHOD_POST);
        $response = $this->send($request, array(
            'fulfillment_event' => $data
        ));
        $fulfillmentEvent->setData($response->fulfillment_event);
    }

    /**
     * Delete a fufillment events
     * @link https://help.shopify.com/api/reference/fulfillmentevent#destroy
     * @param  integer           $orderId
     * @param  integer           $fulfillmentId
     * @param  FulfillmentEvent $fulfillmentEvent
     * @return void
     */
    public function delete($orderId, $fulfillmentId, FulfillmentEvent $fulfillmentEvent)
    {
        $endpoint = '/admin/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events/'.$fulfillmentEvent->getId().'.json';
        $request = $this->createRequests($endpoint, static::REQUEST_METHOD_DELETE);
        $response = $this->send($request);
    }
}
