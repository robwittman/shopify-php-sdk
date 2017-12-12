<?php

namespace Shopify\Enum\Fields;

class PriceRuleFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const TITLE = 'title';
    const TARGET_TYPE = 'target_type';
    const TARGET_SELECTIN = 'target_selection';
    const ALLOCATION_METHOD = 'allocation_method';
    const VALUE_TYPE = 'value_type';
    const VALUE = 'value';
    const ONCE_PER_CUSTOMER = 'once_per_customer';
    const USAGE_LIMIT = 'usage_limit';
    const CUSTOMER_SELECTION = 'customer_selection';
    const PREREQUISITE_SAVED_SEARCH_IDS = 'prerequisite_saved_search_ids';
    const PREREQUISITE_SUBTOTAL_RANGE = 'prerequisite_subtotal_range';
    const PREREQUISITE_SHIPPING_PRICE_RANGE = 'prerequisite_shipping_price_range';
    const ENTITLED_PRODUCT_IDS = 'entitled_product_ids';
    const ENTITLED_COLLECTION_IDS = 'entitled_collection_ids';
    const ENTITLED_COUNTRY_IDS = 'entitled_country_ids';
    const STARTS_AT = 'starts_at';
    const ENDS_AT = 'ends_at';

    public function getFieldTypes()
    {
        return array(
            'created_at' => 'DateTime',
            'id' => 'integer',
            'title' => 'string',
            'target_type' => 'string',
            'target_selection' => 'string',
            'allocation_method' => 'string',
            'value_type' => 'string',
            'value' => "string",
            'once_per_customer' => 'boolean',
            'usage_limit' => 'integer',
            'customer_selection' => 'string',
            'prerequisite_saved_search_ids' => 'array',
            'prerequisite_subtotal_range' => 'object',
            'entitled_product_ids' => 'array',
            'entitled_variant_ids' => 'array',
            'entitled_collection_ids' => 'array',
            'entitled_country_ids' => 'array',
            'starts_at' => 'DateTime',
            'ends_at' => 'DateTime'
        );
    }
}
