<?php

namespace Shopify;

class CustomCollectionTest extends TestCase
{
    public function testCustomCollectionIndex()
    {
        $collections = CustomCollection::all();
        $this->assertInstanceOf('\Shopify\CustomCollection', $collections[0]);
    }

    public function testCustomCollectionGet()
    {
        $collection = CustomCollection::get(231423);
        $this->assertInstanceOf('\Shopify\CustomCollection', $collection);
    }

    public function testCustomCollectionCount()
    {
        $count = CustomCollection::count();
        $this->assertInternalType("int", $count);
    }

    public function testCustomCollectionCreate()
    {
        $collection = new CustomCollection([
            'handle' => 'test-colleciton'
        ]);
        $collection->create();
        $this->assertNotNull($collection->id);
    }

    public function testCustomCollectionUpdate()
    {
        $collection = CustomCollection::get(1234);
        $collection->handle = 'new-collection-handle';
        $collection->update();
        $this->assertEquals($collection->handle, 'new-collection-handle');
    }

    public function testCustomCollectionDelete()
    {
        $collection = CustomCollection::get(1234);
        $collection->delete();
    }
}
