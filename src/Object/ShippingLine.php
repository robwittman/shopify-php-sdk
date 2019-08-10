<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\ShippingLineFields;

class ShippingLine extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return ShippingLineFields::getInstance();
    }
}
