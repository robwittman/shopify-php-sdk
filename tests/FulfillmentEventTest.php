<?php

namespace Shopify;

class FulfillmentEventTest extends TestCase
{
    public function testListFulfillmentEvents()
    {
        $fulfillments = FulfillmentEvent::all(12341,12341);
        $this->assertInstanceOf('\Shopify\FulfillmentEvent', $fulfillments[0]);
    }

    public function testGetFulfillmentEvent()
    {
        $fulfillment = FulfillmentEvent::get(12341,12341234,123412);
        $this->assertInstanceOf('\Shopify\FulfillmentEvent', $fulfillment);
    }

    public function testCreateFulfillmentEvent()
    {
        $fulfillment = new FulfillmentEvent([
            'order_id' => 1234,
            'fulfillment_id' => 1234123,
            'status' => 'in_transit',
            'happened_at' => time()
        ]);
        $fulfillment->create();
        $this->assertNotNull($fulfillment->id);
    }

    public function testDeleteFulfillmentEvent()
    {
        (new FulfillmentEvent([
            'order_id' => 12341,
            'fulfillment_id' => 123412,
            'id' => 12341
        ]))->delete();
    }
}
