<?php

namespace Shopify;

class FulfillmentTest extends TestCase
{
    public function testFulfillmentIndex()
    {
        $fulfillments = Fulfillment::all(450789469);
        $this->assertInstanceOf('\Shopify\Fulfillment', $fulfillments[0]);
    }

    public function testFulfillmentGet()
    {
        $fulfillment = Fulfillment::get(255858046, 450789469);
        $this->assertInstanceOf('\Shopify\Fulfillment', $fulfillment);
    }

    public function testFulfillmentUpdate()
    {
        $tracking_number = "https://google.com/tracking";
        $fulfillment = Fulfillment::get(255858046, 450789469);
        $fulfillment->tracking_number = $tracking_number;
        $fulfillment->update();
        $this->assertEquals($fulfillment->tracking_number, $tracking_number);
    }

    public function testFulfillmentCreate()
    {
        $fulfillment = new Fulfillment([
            'order_id' => 1234123,
            'tracking_company' => 'UPS'
        ]);
        $fulfillment->create();
        $this->assertNotNull($fulfillment->id);
    }

    public function testFulfillmentDelete()
    {
        $fulfillment = (new Fulfillment([
            'id' => 255858046,
            'order_id' => 450789469
        ]))->delete();
        $this->assertNull($fulfillment);
    }
}
