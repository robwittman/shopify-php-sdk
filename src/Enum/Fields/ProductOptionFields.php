<?php

namespace Shopify\Enum\Fields;

class ProductOptionFields extends AbstractObjectEnum
{
    const ID = 'id';
    const PRODUCT_ID = 'product_id';
    const NAME = 'name';
    const POSITION = 'position';
    const VALUES = 'values';

    public function getFieldTypes()
    {
        return array(
            'id' => 'integer',
            'product_id' => 'integer',
            'name' => 'string',
            'position' => 'integer',
            'values' => 'array'
        );
    }
}
