<?php

namespace Shopify\Enum\Fields;

class AbandonedCheckoutFields extends AbstractObjectEnum
{
    const ABANDONED_CHECKOUT_URL = 'abandoned_checkout_url';
    const BILLING_ADDRESS = 'billing_address';
    const BUYER_ACCEPTS_MARKETING = 'buyer_accepts_marketing';
    const CANCEL_REASON = 'cancel_reason';
    const CART_TOKEN = 'cart_token';
    const CLOSED_AT = 'closed_at';
    const COMPLETED_AT = 'completed_at';
    const CREATED_AT = 'created_at';
    const CURRENCY = 'currency';
    const CUSTOMER = 'customer';
    const DISCOUNT_CODES = 'discount_codes';
    const EMAIL = 'email';
    const GATEWAY = 'gateway';
    const ID = 'id';
    const LANDING_SITE = 'landing_site';
    const LINE_ITEMS = 'line_items';
    const NOTE = 'note';
    const REFERRING_SITE = 'referring_site';
    const SHIPPING_ADDRESS = 'shipping_address';
    const SHIPPING_LINES = 'shipping_lines';
    const SOURCE_NAME = 'source_name';
    const SUBTOTAL_PRICE = 'subtotal_price';
    const TAX_LINES = 'tax_lines';
    const TAXES_INCLUDED = 'taxes_included';
    const TOKEN = 'token';
    const TOTAL_DISCOUNTS = 'total_discounts';
    const TOTAL_LINE_ITEMS_PRICE = 'total_line_items_price';
    const TOTAL_PRICE = 'total_price';
    const TOTAL_TAX = 'total_tax';
    const TOTAL_WEIGHT = 'total_weight';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'abandoned_checkout_url' => 'string',
            'billing_address' => 'array',
            'buyer_accepts_marketing' => 'boolean',
            'cancel_reason' => 'string',
            'cart_token' => 'string',
            'closed_at' => 'string',
            'completed_at' => 'DateTime',
            'created_at' => 'DateTime',
            'currency' => 'string',
            'customer' => 'Customer',
            'discount_codes' => 'DiscountCode[]',
            'email' => 'string',
            'gateway' => 'string',
            'id' => 'string',
            'landing_site' => 'string',
            'line_items' => 'LineItem[]',
            'note' => 'string',
            'referring_site' => 'string',
            'shipping_address' => 'Address',
            'shipping_lines' => 'ShippingLine[]',
            'source_name' => 'string',
            'subtotal_price' => 'string',
            'tax_lines' => 'TaxLine[]',
            'taxes_included' => 'boolean',
            'token' => 'string',
            'total_discounts' => 'string',
            'total_line_items_price' => 'string',
            'total_price' => 'string',
            'total_tax' => 'string',
            'total_weight' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
