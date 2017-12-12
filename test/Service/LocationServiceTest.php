<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Location;
use Shopify\Service\LocationService;

class LocationServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/LocationsList.json');
        $service = new LocationService($api);
        $locations = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Location::class,
            $locations
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Location.json');
        $service = new LocationService($api);
        $location = $service->get(1);
        $this->assertInstanceOf(Location::class, $location);
    }
}
