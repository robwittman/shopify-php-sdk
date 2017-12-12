<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\PolicyService;
use Shopify\Object\Policy;

class PolicyServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/PoliciesList.json');
        $service = new PolicyService($api);
        $policies = $service->all();
        $this->assertContainsOnlyInstancesOf(
            Policy::class,
            $policies
        );
    }
}
