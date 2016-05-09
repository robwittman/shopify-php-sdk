<?php

namespace Shopify;

class SmartCollectionTest extends TestCase
{
    public function testListSmartCollections()
    {
        $collections = SmartCollection::all();
        $this->assertInstanceOf('\Shopify\SmartCollection', $collections[0]);
    }

    public function testCountSmartCollections()
    {
        $count = SmartCollection::count();
        $this->assertInternalType("int", $count);
    }

    public function testFetchSmartCollection()
    {
        $coll = SmartCollection::get(12341);
        $this->assertInstanceOf('\Shopify\SmartCollection', $coll);
    }

    public function testCreateSmartCollection()
    {
        $coll = new SmartCollection([
            'handle' => "test-handle",
            'rule' => []
        ]);
        $coll->create();
        $this->assertNotNull($coll->id);
    }

    public function testUpdateSmartCollection()
    {
        $coll = SmartCollection::get(23143);
        $coll->handle = 'testing-update-handle';
        $coll->update();
        $this->assertEquals($coll->handle, 'testing-update-handle');
    }

    public function testDeleteSmartCollection()
    {
        (new SmartCollection([
            'id' => 1234123
        ]))->delete();
    }
}
