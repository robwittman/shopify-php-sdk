<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\TaxLineFields;

class TaxLine extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return TaxLineFields::getInstance();
    }
}
