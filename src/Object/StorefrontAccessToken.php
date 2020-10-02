<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\StorefrontAccessTokenFields;

class StorefrontAccessToken extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return StorefrontAccessTokenFields::getInstance();
    }
}
