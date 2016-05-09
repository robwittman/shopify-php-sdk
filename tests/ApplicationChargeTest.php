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

    public function testApplicationChargeCount()
    {
        $data = ApplicationCharge::count();
        $this->assertInternalType("int",$data);
    }

    public function testActivateApplicationCharge()
    {
        $data = ApplicationCharge::get(1234);
        $this->assertTrue($data->activate());
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testApplicationChargeUpdate()
    {
        $data = ApplicationCharge::get(1234);
        $data->confirmation_url = 'http://google.com';
        $data->update();
    }

    /**
     * @expectedException \Shopify\Exception\ApiException
     */
    public function testApplicationChargeDelete()
    {
        $data = ApplicationCharge::get(1234);
        $data->delete();
    }
}
