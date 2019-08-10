<?php

namespace Shopify\Enum\Fields;

class ApplicationCreditFields extends AbstractObjectEnum
{
    const DESCRIPTION = 'description';
    const ID = 'id';
    const AMOUNT = 'amount';
    const TEST = 'test';

    public function getFieldTypes()
    {
        return array(
            'description' => 'string',
            'id' => 'integer',
            'amount' => 'string',
            'test' => 'boolean'
        );
    }
}
