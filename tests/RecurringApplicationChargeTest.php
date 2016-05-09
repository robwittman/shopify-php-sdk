<?php

namespace Shopify;

class RecurringApplicationChargeTest extends TestCase
{
    public function testRecurringApplicationChargeCreate()
    {
        $charge = new RecurringApplicationCharge([
            'name' => 'test_charge',
            'price' => 10.00
        ]);
        $charge->create();
        $this->assertNotNull($charge->id);
    }

    public function testRecurringApplicationChargeGet()
    {
        $charge = RecurringApplicationCharge::get(12341);
        $this->assertInstanceOf('\Shopify\RecurringApplicationCharge', $charge);
    }

    public function testRecurringApplicationChargeIndex()
    {
        $charges = RecurringApplicationCharge::all();
        $this->assertInstanceOf('\Shopify\RecurringApplicationCharge', $charges[0]);
    }

    public function testRecurringAPplicationChargeActivate()
    {
        $charge = RecurringApplicationCharge::get(12341);
        $charge->activate();
    }

    public function testRecurringApplicationChargeCancel()
    {
        (new RecurringApplicationCharge([
            'id' => 1234123
        ]))->delete();
    }

    public function testRecurringApplicationChargeUpdate()
    {

    }
}
