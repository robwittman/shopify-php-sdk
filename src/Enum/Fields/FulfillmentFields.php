<?php

namespace Shopify\Enum\Fields;

class FulfillmentFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const LINE_ITEMS = 'line_items';
    const NOTIFY_CUSTOMER = 'notify_customer';
    const ORDER_ID = 'order_id';
    const RECEIPT = 'receipt';
    const STATUS = 'status';
    const TRACKING_COMPANY = 'tracking_company';
    const TRACKING_NUMBERS = 'tracking_numbers';
    const TRACKING_URLS = 'tracking_urls';
    const LOCATION_ID = 'location_id';
    const UPDATED_AT = 'updated_at';
    const VARIANT_INVENTORY_MANAGEMENT = 'variant_inventory_management';

    public function getFieldTypes()
    {
        return array(
            'created_at' => 'DateTime',
            'id' => 'integer',
            'line_items' => 'LineItem[]',
            'notify_customer' => 'boolean',
            'order_id' => 'integer',
            'receipt' => "object",
            'status' => 'string',
            'tracking_company' => 'string',
            'tracking_numbers' => 'array',
            'tracking_urls' => 'array',
            'location_id' => 'integer',
            'updated_at' => 'DateTime',
            'variant_inventory_management' => 'string'
        );
    }
}
