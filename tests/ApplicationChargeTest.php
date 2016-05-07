<?php

namespace Shopify;

class ApplicationChargeTest extends TestCase
{
    public function testApplicationChargeIndex()
    {
        $data = ApplicationCharge::all();

        $this->assertInstanceOf('\Shopify\ApplicationCharge', $data[0]);
    }

    public function testApplicationChargeGet()
    {
        $data = ApplicationCharge::get(1324);

        $this->assertInstanceOf('\Shopify\ApplicationCharge', $data);
    }
}
