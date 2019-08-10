<?php

namespace Shopify\Enum\Fields;

class ApplicationChargeFields extends AbstractObjectEnum
{
    const CONFIRMATION_URL = 'confirmation_url';
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const NAME = 'name';
    const PRICE = 'price';
    const RETURN_URL = 'return_url';
    const STATUS = 'status';
    const TEST = 'test';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'confirmation_url' => 'string',
            'created_at' => 'DateTime',
            'id' => 'integer',
            'name' => 'string',
            'price' => 'string',
            'return_url' => 'string',
            'status' => 'string',
            'test' => 'boolean',
            'updated_at' => 'DateTime'
        );
    }
}
