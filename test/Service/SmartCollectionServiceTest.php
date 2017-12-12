<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\SmartCollection;
use Shopify\Service\SmartCollectionService;

class SmartCollectionServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/SmartCollectionsList.json');
        $service = new SmartCollectionService($api);
        $smartCollections = $service->all();
        $this->assertContainsOnlyInstancesOf(
            SmartCollection::class,
            $smartCollections
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/SmartCollection.json');
        $service = new SmartCollectionService($api);
        $smartCollection = $service->get(1234);
        $this->assertInstanceOf(SmartCollection::class, $smartCollection);
    }
}
