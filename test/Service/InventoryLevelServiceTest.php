<?php

namespace Shopify\Test\Service;

use Shopify\Object\InventoryLevel;
use Shopify\Service\InventoryLevelService;
use Shopify\Test\TestCase;

class InventoryLevelServiceTest extends TestCase
{
    public function testList()
    {
        $api = $this->getApiMock('lists/InventoryLevelsList.json');
        $service = new InventoryLevelService($api);
        $inventoryLevels = $service->all(array('inventory_item_ids' => '2084329160713,2197022867465'));
        $this->assertContainsOnlyInstancesOf(
            InventoryLevel::class,
            $inventoryLevels
        );
    }
}
