<?php

namespace Shopify\Enum\Fields;

class DiscountCodeFields extends AbstractObjectEnum
{
    const ID = 'id';
    const CODE = 'code';
    const CREATED_AT = 'created_at';
    const PRICE_RULE_ID = 'price_rule_id';
    const USAGE_COUNT = 'usage_count';

    public function getFieldTypes()
    {
        return array(
            'id' => 'integer',
            'code' => 'string',
            'created_at' => 'DateTime',
            'price_rule_id' => 'integer',
            'usage_count' => 'integer'
        );
    }
}
