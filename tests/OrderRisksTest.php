<?php

namespace Shopify;

class OrderRisksTest extends TestCase
{
    public function testFetchedRidksHasOrderId()
    {
        $risk = OrderRisks::get(12341,12341234);
        $this->assertEquals($risk->order_id, 12341234);
    }
    public function testOrderRisksCreate()
    {
        $risk = new OrderRisks([
            'order_id' => 1234123,
            'message' => "This order is weird",
            'score' => 1.0,
            'display' => true
        ]);
        $risk->create();
        $this->assertNotNull($risk->id);
    }

    public function testOrderRisksIndex()
    {
        $risk = OrderRisks::all(12341);
        $this->assertInstanceOf('\Shopify\OrderRisks', $risk[0]);
    }

    public function testOrderRisksGet()
    {
        $risk = OrderRisks::get(12341, 1234443);
        $this->assertInstanceOf('\Shopify\OrderRisks', $risk);
    }

    public function testUpdateOrderRisks()
    {
        $risk = OrderRisks::get(12341,123412);
        $risk->message = "Update message";
        $risk->update();
        $this->assertEquals($risk->message, "Update message");
    }

    public function testDeleteOrderRisks()
    {
        $risk = (new OrderRisks([
            'order_id' => 12341234,
            'id' => 12341
        ]))->delete();
    }
}
