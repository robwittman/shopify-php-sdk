<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Object\Province;
use Shopify\Service\ProvinceService;

class ProvinceServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ProvincesList.json');
        $service = new ProvinceService($api);
        $provinces = $service->all(1);
        $this->assertContainsOnlyInstancesOf(
            Province::class,
            $provinces
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/Province.json');
        $service = new ProvinceService($api);
        $province = $service->get(1, 1);
        $this->assertInstanceOf(Province::class, $province);
    }
}
