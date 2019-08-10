<?php

namespace Shopify\Enum\Fields;

class LineItemFields extends AbstractObjectEnum
{
    const FULFILLABLE_QUANTITY = 'fulfillable_quantity';
    const FULFILLMENT_SERVICE = 'fulfillment_service';
    const FULFILLMENT_STATUS = 'fulfillment_status';
    const GRAMS = 'grams';
    const ID = 'id';
    const PRICE = 'price';
    const PRODUCT_ID = 'product_id';
    const QUANTITY = 'quantity';
    const REQUIRES_SHIPPING = 'requires_shipping';
    const SKU = 'sku';
    const TITLE = 'title';
    const VARIANT_ID = 'variant_id';
    const VARIANT_TITLE = 'variant_title';
    const VENDOR = 'vendor';
    const NAME = 'name';
    const GIFT_CARD = 'gift_card';
    const PROPERTIES = 'properties';
    const TAXABLE = 'taxable';
    const TAX_LINES = 'tax_lines';
    const TOTAL_DISCOUNT = 'total_discount';

    public function getFieldTypes()
    {
        return array(
            'fulfillable_quantity' => 'integer',
            'fulfillment_service' => 'string',
            'fulfillment_status' => 'string',
            'grams' => 'integer',
            'id' => 'integer',
            'price' => 'string',
            'product_id' => 'integer',
            'quantity' => 'integer',
            'requires_shipping' => 'boolean',
            'sku' => 'string',
            'title' => 'string',
            'variant_id' => 'integer',
            'variant_title' => 'string',
            'vendor' => 'string',
            'name' => 'string',
            'gift_card' => 'object',
            'properties' => 'array',
            'taxable' => 'boolean',
            'tax_lines' => 'TaxLine[]',
            'total_discount' => 'string'
        );
    }
}
