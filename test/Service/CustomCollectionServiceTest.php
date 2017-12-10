<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\CustomCollection;
use Shopify\Service\CustomCollectionService;

class CustomCollectionServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/CustomCollectionsList.json');
        $service = new CustomCollectionService($api);
        $collections = $service->all();
        $this->assertContainsOnlyInstancesOf(
            CustomCollection::class,
            $collections
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/CustomCollection.json');
        $service = new CustomCollectionService($api);
        $collection = $service->get(1);
        $this->assertInstanceOf(CustomCollection::class, $collection);
    }
}
