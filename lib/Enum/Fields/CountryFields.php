<?php

namespace Shopify\Enum\Fields;

class CountryFields extends AbstractObjectEnum
{
    const CODE = 'code';
    const ID = 'id';
    const NAME = 'name';
    const PROVINCES = 'provinces';
    const TAX = 'tax';

    public function getFieldTypes()
    {
        return array(
            'code' => "string",
            'id' => 'integer',
            'name' => 'string',
            'provinces' => 'Province[]',
            'tax' => 'string'
        );
    }
}
