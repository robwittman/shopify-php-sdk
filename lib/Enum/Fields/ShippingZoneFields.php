<?php

namespace Shopify\Enum\Fields;

class TransactionFields extends AbstractObjectEnum
{
    const ID = 'id';
    const NAME = 'name';
    const COUNTRIES = 'countries';
    const PROVINCES = 'provinces';
    const CARRIER_SHIPPING_RATE_PROVIDERS = 'carrier_shipping_rate_providers';
    const PRICE_BASED_SHIPPING_RATES = 'price_based_shipping_rates';
    const WEIGHT_BASED_SHIPPING_RATES = 'weight_based_shipping_rates';

    public function getFieldTypes()
    {
        return array(
            'id' => 'integer',
            'name' => 'string',
            'countries' => "Country[]",
            'provinces' => 'Province[]',
            'carrier_shipping_rate_providers' => 'array',
            'price_based_shipping_rates' => 'array',
            'weight_based_shipping_rates' => 'array'
        );
    }
}
