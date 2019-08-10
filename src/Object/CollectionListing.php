<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\CollectionListingFields;

class CollectionListing extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return CollectionListingFields::getInstance();
    }
}
