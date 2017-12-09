<?php

namespace Shopify\Test\Storage;

use Shopify\Test\TestCase;
use Shopify\Storage\MemoryStorage;

class MemoryStorageTest extends TestCase
{
    public function testGetSet()
    {
        $storage = new MemoryStorage();
        $storage->set('test', 'test-data');
        $this->assertEquals($storage->get('test'), 'test-data');
    }
}
