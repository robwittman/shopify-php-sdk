<?php

namespace Shopify\Test\Storage;

use Shopify\Test\TestCase;
use Shopify\Storage\SessionStorage;

class SessionStorageTest extends TestCase
{
    public function testGetSet()
    {
        $storage = new SessionStorage();
        $storage->set('test', 'test-data');
        $this->assertEquals($storage->get('test'), 'test-data');
    }
}
