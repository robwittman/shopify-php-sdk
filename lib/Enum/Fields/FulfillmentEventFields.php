<?php

namespace Shopify\Enum\Fields;

class FulfillmentEventFields extends AbstractObjectEnunm
{
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const ID = 'id';
    const SHOP_ID = 'shop_id';
    const ORDER_ID = 'order_id';
    const FULFILLMENT_ID = 'fulfillment_id';
    const STATUS = 'status';
    const HAPPENED_AT = 'happened_at';
    const MESSAGE = 'message';
    const CITY = 'city';
    const PROVINCE = 'province';
    const ZIP = 'zip';
    const COUNTRY = 'country';
    const ADDRESS1 = 'address1';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';

    public function getFieldTypes()
    {
        return array(
            'created_at' => "string",
            'updated_at' => 'DateTime',
            'id' => 'integer',
            'shop_id' => 'integer',
            'order_id' => 'integer',
            'fulfillment_id' => 'integer',
            'status' => 'string',
            'happened_at' => 'DateTime',
            'message' => 'string',
            'city' => 'string',
            'province' => 'string',
            'zip' => 'string',
            'country' => 'string',
            'address1' => 'string',
            'latitude' => 'string',
            'longitude' => 'string'
        );
    }
}
