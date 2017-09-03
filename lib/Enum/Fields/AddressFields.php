<?php

namespace Shopify\Enum\Fields;

class AddressFields extends AbstractObjectEnum
{
    const ADDRESS1 = 'address1';
    const ADDRESS2 = 'address2';
    const CITY = 'city';
    const COMPANY = 'company';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const PHONE = 'phone';
    const PROVINCE = 'province';
    const COUNTRY = 'country';
    const ZIP = 'zip';
    const NAME = 'name';
    const PROVINCE_CODE = 'province_code';
    const COUNTRY_CODE = 'country_code';
    const COUNTRY_NAME = 'country_name';

    public function getFieldTypes()
    {
        return array(
            'address1' => 'string',
            'address2' => 'string',
            'city' => 'string',
            'company' => 'string',
            'first_name' => 'string',
            'last_name' => 'string',
            'phone' => 'string',
            'province' => 'string',
            'country' => 'string',
            'zip' => 'string',
            'name' => 'string',
            'province_code' => 'string',
            'country_code' => 'string',
            'country_name' => 'string'
        );
    }
}
