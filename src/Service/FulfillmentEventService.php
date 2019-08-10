<?php

namespace Shopify\Service;

use Shopify\Object\FulfillmentEvent;

class FulfillmentEventService extends AbstractService
{
    /**
     * Receive a list of all fulfillment events
     *
     * @link   https://help.shopify.com/api/reference/fulfillmentevent#index
     * @param  integer $orderId
     * @param  integer $fulfillmentId
     * @return FulfillmentEvent[]
     */
    public function all($orderId, $fulfillmentId)
    {
        $endpoint = '/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events.json';
        $response = $this->request($endpoint, 'GET');
        return $this->createCollection(FulfillmentEvent::class, $response['fulfillment_events']);
    }

    /**
     * Get a specific fulfillment event
     *
     * @link   https://help.shopify.com/api/reference/fulfillmentevent#show
     * @param  integer $orderId
     * @param  integer $fulfillmentId
     * @param  integer $fulfillmentEventId
     * @return FulfillmentEvent
     */
    public function get($orderId, $fulfillmentId, $fulfillmentEventId)
    {
        $endpoint = '/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events/'.$fulfillmentEventId.'.json';
        $response = $this->request($endpoint);
        return $this->createObject(FulfillmentEvent::class, $response['fulfillment_event']);
    }

    /**
     * Create a fulfillment event
     *
     * @link   https://help.shopify.com/api/reference/fulfillmentevent#create
     * @param  integer          $orderId
     * @param  integer          $fulfillmentId
     * @param  FulfillmentEvent $fulfillmentEvent
     * @return void
     */
    public function create($orderId, $fulfillmentId, FulfillmentEvent &$fulfillmentEvent)
    {
        $data = $fulfillmentEvent->exportData();
        $endpoint = '/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events.json';
        $response = $this->request(
            $endpoint, 'POST', array(
            'fulfillment_event' => $data
            )
        );
        $fulfillmentEvent->setData($response['fulfillment_event']);
    }

    /**
     * Delete a fulfillment events
     *
     * @link   https://help.shopify.com/api/reference/fulfillmentevent#destroy
     * @param  integer          $orderId
     * @param  integer          $fulfillmentId
     * @param  FulfillmentEvent $fulfillmentEvent
     * @return void
     */
    public function delete($orderId, $fulfillmentId, FulfillmentEvent $fulfillmentEvent)
    {
        $endpoint = '/orders/'.$orderId.'/fulfillments/'.$fulfillmentId.'/events/'.$fulfillmentEvent->id.'.json';
        $this->request($endpoint, 'DELETE');
        return;
    }
}
