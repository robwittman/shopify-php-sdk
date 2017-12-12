<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\PriceRuleFields;

class PriceRule extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return PriceRuleFields::getInstance();
    }
}
