<?php

namespace Shopify\Enum\Fields;

class PriceRuleFields extends AbstractObjectEnum
{
    const ALLOCATION_METHOD = 'allocation_method';
    const CREATED_AT = 'created_at';
    const CUSTOMER_SELECTION = 'customer_selection';
    const ENDS_AT = 'ends_at';
    const ENTITLED_COLLECTION_IDS = 'entitled_collection_ids';
    const ENTITLED_COUNTRY_IDS = 'entitled_country_ids';
    const ENTITLED_PRODUCT_IDS = 'entitled_product_ids';
    const ENTITLED_VARIANT_IDS = 'entitled_variant_ids';
    const ID = 'id';
    const ONCE_PER_CUSTOMER = 'once_per_customer';
    const PREREQUISITE_CUSTOMER_IDS = 'prerequisite_customer_ids';
    const PREREQUISITE_QUANTITY_RANGE = 'prerequisite_quantity_range';
    const PREREQUISITE_SAVED_SEARCH_IDS = 'prerequisite_saved_search_ids';
    const PREREQUISITE_SHIPPING_PRICE_RANGE = 'prerequisite_shipping_price_range';
    const PREREQUISITE_SUBTOTAL_RANGE = 'prerequisite_subtotal_range';
    const STARTS_AT = 'starts_at';
    const TARGET_SELECTION = 'target_selection';
    const TARGET_TYPE = 'target_type';
    const TITLE = 'title';
    const USAGE_LIMIT = 'usage_limit';
    const PREREQUISITE_PRODUCT_IDS = 'prerequisite_product_ids';
    const PREREQUISITE_VARIANT_IDS = 'prerequisite_variant_ids';
    const PREREQUISITE_COLLECTION_IDS = 'prerequisite_collection_ids';
    const VALUE_TYPE = 'value_type';
    const VALUE = 'value';
    const PREREQUISITE_TO_ENTITLEMENT_QUANTITY_RATIO = 'prerequisite_to_entitlement_quantity_ratio';

    public function getFieldTypes()
    {
        return array(
            'allocation_method' => 'string',
            'created_at' => 'DateTime',
            'customer_selection' => 'string',
            'ends_at' => 'DateTime',
            'entitled_collection_ids' => 'array',
            'entitled_country_ids' => 'array',
            'entitled_product_ids' => 'array',
            'entitled_variant_ids' => 'array',
            'id' => 'integer',
            'once_per_customer' => 'boolean',
            'prerequisite_customer_ids' => 'array',
            'prerequisite_quantity_range' => 'array',
            'prerequisite_saved_search_ids' => 'array',
            'prerequisite_shipping_price_range' => 'object',
            'prerequisite_subtotal_range' => 'object',
            'starts_at' => 'DateTime',
            'target_selection' => 'string',
            'target_type' => 'string',
            'title' => 'string',
            'usage_limit' => 'integer',
            'prerequisite_product_ids' => 'array',
            'prerequisite_variant_ids' => 'array',
            'prerequisite_collection_ids' => 'array',
            'value' => "string",
            'value_type' => 'string',
            'prerequisite_to_entitlement_quantity_ratio' => 'object'
        );
    }
}
