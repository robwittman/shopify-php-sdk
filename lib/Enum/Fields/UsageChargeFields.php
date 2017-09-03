<?php

namespace Shopify\Enum\Fields;

class UsageChargeFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const DESCRIPTION = 'description';
    const ID = 'id';
    const PRICE = 'price';
    const RECURRING_APPLICATION_CHARGE = 'recurring_application_charge';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'created_at' => 'DateTime',
            'description' => 'string',
            'id' => 'integer',
            'price' => 'string',
            'recurring_application_charge' => 'integer',
            'updated_at' => 'DateTime'
        );
    }
}
