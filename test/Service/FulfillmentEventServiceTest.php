<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\FulfillmentEvent;
use Shopify\Service\FulfillmentEventService;

class FulfillmentEventServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/FulfillmentEventsList.json');
        $service = new FulfillmentEventService($api);
        $events = $service->all(1, 2);
        $this->assertContainsOnlyInstancesOf(
            FulfillmentEvent::class,
            $events
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/FulfillmentEvent.json');
        $service = new FulfillmentEventService($api);
        $event = $service->get(1, 2, 3);
        $this->assertInstanceOf(FulfillmentEvent::class, $event);
    }
}
