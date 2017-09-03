<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\TaxLinesFields;

class TaxLines extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return TaxLinesFields::getInstance();
    }
}
