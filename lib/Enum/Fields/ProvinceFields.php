<?php

namespace Shopify\Enum\Fields;

class ProvinceFields extends AbstractObjectEnum
{
    const CODE = 'code';
    const COUNTRY_ID = 'country_id';
    const ID = 'id';
    const NAME = 'name';
    const SHIPPING_ZONE_ID = 'shipping_zone_id';
    const TAX = 'tax';
    const TAX_NAME = 'tax_name';
    const TAX_TYPE = 'tax_type';
    const TAX_PERCENTAGE = 'tax_percentage';

    public function getFieldTypes()
    {
        return array(
            'code' => 'string',
            'country_id' => 'integer',
            'id' => 'integer',
            'name' => 'string',
            'shipping_zone_id' => 'integer',
            'tax' => 'string',
            'tax_name' => 'string',
            'tax_type' => 'string',
            'tax_percentage' => 'string'
        );
    }
}
