<?php

namespace Shopify\Test\Storage;

use Shopify\Test\ShopifyTest;
use Shopify\Storage\SessionStorage;

class SessionStorageTest extends ShopifyTest
{
    public function testGetSet()
    {
        $storage = new SessionStorage();
        $storage->set('test', 'test-data');
        $this->assertEquals($storage->get('test'), 'test-data');
    }
}
