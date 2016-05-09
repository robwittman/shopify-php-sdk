<?php

namespace Shopify;

class ProvinceTest extends TestCase
{
    public function testProvinceList()
    {
        $list = Province::all(1243);
        $this->assertInstanceOf('\Shopify\Province', $list[0]);
    }

    public function testProvinceGet()
    {
        $obj = Province::get(1234,123412);
        $this->assertInstanceOf('\Shopify\Province', $obj);
    }

    public function testProvinceCount()
    {
        $count = Province::count(11324);
        $this->assertInternalType("int", $count);
    }

    public function testProvinceUpdate()
    {
        $prov = Province::get(1234,12341);
        $prov->tax = 0.12;
        $prov->update();
        $this->assertEquals($prov->tax, 0.12);
    }
}
