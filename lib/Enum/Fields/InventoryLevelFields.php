<?php

namespace Shopify\Enum\Fields;

class InventoryLevelFields extends AbstractObjectEnum
{
    const INVENTORY_ITEM_ID = 'inventory_item_id';
    const LOCATION_ID = 'location_id';
    const AVAILABLE = 'available';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'inventory_item_id' => 'integer',
            'location_id' => 'integer',
            'available' => 'integer',
            'updated_at' => 'DateTime',
        );
    }
}
