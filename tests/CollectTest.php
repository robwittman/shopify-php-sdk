<?php

namespace Shopify;

class CollectTest extends TestCase
{
    public function testCollectIndex()
    {
        $collects = Collect::all();
        $this->assertInstanceOf('\Shopify\Collect', $collects[0]);
    }

    public function testCollectGet()
    {
        $collect = Collect::get(1245);
        $this->assertInstanceOf('\Shopify\Collect', $collect);
    }

    public function testCollectDelete()
    {
        $collect = Collect::get(1234);
        $collect->delete();
    }

    public function testCollectCount()
    {
        $count = Collect::count();
        $this->assertInternalType("int", $count);
    }
}
