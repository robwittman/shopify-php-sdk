<?php

namespace Shopify\Enum\Fields;

class CheckoutFields extends AbstractObjectEnum
{
    const BILLING_ADDRESS = 'billing_address';
    const BUYER_ACCEPTS_MARKETING = 'buyer_accepts_marketing';
    const CREATED_AT = 'created_at';
    const CURRENCY = 'currency';
    const CUSTOMER_ID = 'customer_id';
    const DISCOUNT_CODE = 'discount_code';
    const APPLIED_DISCOUNT = 'applied_discount';
    const EMAIL = 'email';
    const GIFT_CARDS = 'gift_cards';
    const LINE_ITEMS = 'line_items';
    const PHONE = 'phone';
    const REQUIRES_SHIPPING = 'requires_shipping';
    const SHIPPING_ADDRESS = 'shipping_address';
    const SHIPPING_RATES = 'shipping_rates';
    const SHIPPING_RATE = 'shipping_rate';
    const SHIPPING_LINE = 'shipping_line';
    const SUBTOTAL_PRICE = 'subtotal_price';
    const TAX_LINES = 'tax_lines';
    const TAXES_INCLUDED = 'taxes_included';
    const TOKEN = 'token';
    const TOTAL_PRICE = 'total_price';
    const TOTAL_TAX = 'total_tax';
    const UPDATED_AT = 'updated_at';
    const ORDER = 'order';
    const USER_ID = 'user_id';
    const WEB_URL = 'web_url';
    const PAYMENT_URL = 'payment_url';
    const RESERVATION_TIME = 'reservation_time';
    const RESERVATION_TIME_LEFT = 'reservation_time_left';
    const SOURCE_NAME = 'source_name';
    const PAYMENT_DUE = 'payment_due';
    const REQUEST_DETAILS = 'request_details';

    public function getFieldTypes()
    {
        return array(
            'billing_address' => 'Address',
            'buyer_accepts_marketing' => 'boolean',
            'created_at' => 'DateTime',
            'currency' => 'string',
            'customer_id' => 'integer',
            'discount_code' => 'string',
            'applied_discount' => 'string',
            'email' => 'string',
            'gift_cards' => 'array',
            'line_items' => 'LineItem[]',
            'phone' => 'string',
            'requires_shipping' => 'boolean',
            'shipping_address' => 'Address',
            'shipping_rates' => 'array',
            'shipping_rate' => 'array',
            'shipping_line' => 'array',
            'subtotal_price' => 'string',
            'tax_lines' => 'TaxLine[]',
            'taxes_included' => 'boolean',
            'token' => 'string',
            'total_price' => 'string',
            'total_tax' => 'string',
            'updated_at' => 'DateTime',
            'order' => 'object',
            'user_id' => 'integer',
            'web_url' => 'string',
            'payment_url' => "string",
            'reservation_time' => 'integer',
            'reservation_time_left' => 'string',
            'source_name' => 'string',
            'payment_due' => 'string',
            'request_details' => 'object'
        );
    }
}
