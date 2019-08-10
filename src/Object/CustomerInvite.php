<?php

namespace Shopify\Object;

use Shopify\Enum\Fields\CustomerInviteFields;

class CustomerInvite extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return CustomerInviteFields::getInstance();
    }
}
