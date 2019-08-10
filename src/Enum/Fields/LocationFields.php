<?php

namespace Shopify\Enum\Fields;

class LocationFields extends AbstractObjectEnum
{
    const ID = 'id';
    const NAME = 'name';
    const ADDRESS1 = 'address1';
    const ADDRESS2 = 'address2';
    const ZIP = 'zip';
    const CITY = 'city';
    const PROVINCE = 'province';
    const COUNTRY = 'country';
    const PHONE = 'phone';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'id' => 'integer',
            'name' => 'string',
            'address1' => 'string',
            'address2' => 'string',
            'zip' => 'string',
            'city' => 'string',
            'province' => 'string',
            'country' => 'string',
            'phone' => 'string',
            'created_at' => 'DateTime',
            'updated_at' => 'DateTime'
        );
    }
}
