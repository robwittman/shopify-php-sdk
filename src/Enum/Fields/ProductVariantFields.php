<?php

namespace Shopify\Enum\Fields;

class ProductVariantFields extends AbstractObjectEnum
{
    const BARCODE = 'barcode';
    const COMPARE_AT_PRICE = 'compare_at_price';
    const CREATED_AT = 'created_at';
    const FULFILLMENT_SERVICE = 'fulfillment_service';
    const GRAMS = 'grams';
    const ID = 'id';
    const IMAGE_ID = 'image_id';
    const INVENTORY_MANAGEMENT = 'inventory_management';
    const INVENTORY_POLICY = 'inventory_policy';
    const INVENTORY_QUANTITY = 'inventory_quantity';
    const OLD_INVENTORY_QUANTITY = 'old_inventory_quantity';
    const INVENTORY_QUANTITY_ADJUSTMENT = 'inventory_quantity_adjustment';
    const METAFIELD = 'metafield';
    const OPTION1 = 'option1';
    const OPTION2 = 'option2';
    const OPTION3 = 'option3';
    const POSITION = 'position';
    const PRICE = 'price';
    const PRODUCT_ID = 'product_id';
    const REQUIRES_SHIPPING = 'requires_shipping';
    const SKU = 'sku';
    const TAXABLE = 'taxable';
    const TITLE = 'title';
    const UPDATED_AT = 'updated_at';
    const WEIGHT = 'weight';
    const WEIGHT_UNIT = 'weight_unit';
    const INVENTORY_ITEM_ID = 'inventory_item_id';

    public function getFieldTypes()
    {
        return array(
            'barcode' => 'string',
            'compare_at_price' => 'string',
            'created_at' => 'DateTime',
            'fulfillment_service' => 'string',
            'grams' => 'integer',
            'id' => 'integer',
            'image_id' => 'integer',
            'inventory_management' => 'string',
            'inventory_policy' => 'string',
            'old_inventory_quantity' => 'integer',
            'inventory_quantity' => 'integer',
            'inventory_quantity_adjustment' => 'string',
            'metafield' => 'array',
            'option1' => 'string',
            'option2' => 'string',
            'option3' => 'string',
            'position' => 'integer',
            'price' => 'string',
            'product_id' => 'integer',
            'requires_shipping' => 'boolean',
            'sku' => 'string',
            'taxable' => 'boolean',
            'title' => 'string',
            'updated_at' => 'DateTime',
            'weight' => 'string',
            'weight_unit' => 'string',
            'inventory_item_id' => 'integer',
        );
    }
}
