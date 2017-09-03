<?php

namespace Shopify\Enum\Fields;

class DiscountFields extends AbstractObjectEnum
{
    const AMOUNT = 'amount';
    const CODE = 'code';
    const TYPE = 'type';

    public function getFieldTypes()
    {
        return array(
            'amount' => 'string',
            'code' => 'string',
            'type' => 'string'
        );
    }
}
