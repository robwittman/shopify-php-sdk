<?php

namespace Shopify\Test\Service;

use Shopify\Test\TestCase;
use Shopify\Service\ProductVariantService;
use Shopify\Object\ProductVariant;

class ProductVariantServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/ProductVariantsList.json');
        $service = new ProductVariantService($api);
        $charges = $service->all(1);
        $this->assertContainsOnlyInstancesOf(
            ProductVariant::class,
            $charges
        );
    }

    public function testGet()
    {
        $api = $this->getApiMock('objects/ProductVariant.json');
        $service = new ProductVariantService($api);
        $charge = $service->get(1);
        $this->assertInstanceOf(ProductVariant::class, $charge);
    }
}
