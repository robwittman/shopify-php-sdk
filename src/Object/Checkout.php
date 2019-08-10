<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\CheckoutFields;

class Checkout extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return CheckoutFields::getInstance();
    }
}
