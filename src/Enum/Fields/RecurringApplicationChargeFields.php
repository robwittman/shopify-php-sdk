<?php

namespace Shopify\Enum\Fields;

class RecurringApplicationChargeFields extends AbstractObjectEnum
{
    const ACTIVATED_ON = 'activated_on';
    const BILLING_ON = 'billing_on';
    const CANCELLED_ON = 'cancelled_on';
    const CAPPED_AMOUNT = 'capped_amount';
    const CONFIRMATION_URL = 'confirmation_url';
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const NAME = 'name';
    const PRICE = 'price';
    const RETURN_URL = 'return_url';
    const STATUS = 'status';
    const TERMS = 'terms';
    const TEST = 'test';
    const TRIAL_DAYS = 'trial_days';
    const TRIAL_ENDS_ON = 'trial_ends_on';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'activated_on' => 'string',
            'billing_on' => "DateTime",
            'cancelled_on' => 'DateTime',
            'capped_amount' => 'string',
            'confirmation_url' => 'string',
            'created_at' => 'DateTime',
            'id' => 'integer',
            'name' => 'string',
            'price' => 'string',
            'return_url' => 'string',
            'status' => 'string',
            'terms' => 'string',
            'test' => 'boolean',
            'trial_days' => 'integer',
            'trial_ends_on' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
