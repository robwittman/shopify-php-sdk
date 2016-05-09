<?php

namespace Shopify;

class RefundTest extends TestCase
{
    public function testRefundList()
    {
        $list = Refund::all(12341);
        $this->assertInstanceOf('\Shopify\Refund', $list[0]);
    }

    public function testRefundGet()
    {
        $obj = Refund::get(123421, 12341);
        $this->assertInstanceOf('\Shopify\Refund', $obj);
    }

    public function testRefundCalculate()
    {

    }

    public function testRefundCreate()
    {
        $refund = new Refund([
            'order_id' => 12341,
            'amount' => 10.00
        ]);
        $refund->create();
        $this->assertNotNull($refund->id);
    }
}
