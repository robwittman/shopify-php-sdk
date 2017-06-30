<?php

namespace Shopify\Test\Storage;

use Shopify\Test\ShopifyTest;
use Shopify\Storage\MemoryStorage;

class MemoryStorageTest extends ShopifyTest
{
    public function testGetSet()
    {
        $storage = new MemoryStorage();
        $storage->set('test', 'test-data');
        $this->assertEquals($storage->get('test'), 'test-data');
    }
}
