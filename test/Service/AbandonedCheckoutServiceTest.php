<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\AbandonedCheckoutsService;
use Shopify\Object\AbandonedCheckout;

class AbandonedCheckoutServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/AbandonedCheckoutsList.json');
        $service = new AbandonedCheckoutsService($api);
        $checkouts = $service->all();
        $this->assertContainsOnlyInstancesOf(
            AbandonedCheckout::class,
            $checkouts
        );
    }
}
