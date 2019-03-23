<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\InventoryLevelFields;

class InventoryLevel extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return InventoryLevelFields::getInstance();
    }
}
