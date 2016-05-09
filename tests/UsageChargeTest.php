<?php

namespace Shopify;

class UsageChargeTest extends TestCase
{
    public function testCreateUsageCharge()
    {
        $usage_charge = new UsageCharge([
            'recurring_application_charge_id' => 123412,
            'description' => "charge description",
            'price' => 5.0
        ]);
        $usage_charge->create();
        $this->assertNotNull($usage_charge->id);
    }

    public function testFetchUsageCharge()
    {
        $usage_charge = UsageCharge::get(12341, 1234123);
        $this->assertInstanceOf('\Shopify\UsageCharge', $usage_charge);
    }

    public function testListUsageCharges()
    {
        $usage_charges = UsageCharge::all(12341);
        $this->assertInstanceOf("\Shopify\UsageCharge", $usage_charges[0]);
    }
}
