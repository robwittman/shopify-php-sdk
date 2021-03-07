<?php

namespace Shopify\Enum\Fields;

class InventoryLevelFields extends AbstractObjectEnum
{
    const INVENTORY_ITEM_ID         = 'inventory_item_id';          //The ID for the inventory item.
    const LOCATION_ID               = 'location_id';                //The ID of the location that the inventory level belongs to. To find the ID of the location, use the Location resource.
    const AVAILABLE                 = 'available';                  //Sets the available inventory quantity.
    const AVAILABLE_ADJUSTMENT      = 'available_adjustment';       //The amount to adjust the available inventory quantity. Send negative values to subtract from the current available quantity. For example, "available_adjustment": 2 increases the current available quantity by 2, and "available_adjustment": -3 decreases the current available quantity by 3.
    const DISCONNECT_IF_NECESSARY   = 'disconnect_if_necessary';    //Whether inventory for any previously connected locations will be set to 0 and the locations disconnected. This property is ignored when no fulfillment service is involved. For more information, see Inventory levels and fulfillment service locations. (default: false)

    public function getFieldTypes()
    {
        return array(
            'inventory_item_id'         => 'integer',
            'location_id'               => 'integer',
            'available'                 => 'integer',
            'available_adjustment'      => 'integer',
            'disconnect_if_necessary'   => 'boolean',
        );
    }
}