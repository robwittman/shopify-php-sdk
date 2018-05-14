<?php

namespace Shopify\Enum\Fields;

class OrderFields extends AbstractObjectEnum
{
    const APP_ID = 'app_id';
    const BILLING_ADDRESS = 'billing_address';
    const BROWSER_IP = 'browser_ip';
    const BUYER_ACCEPTS_MARKETING = 'buyer_accepts_marketing';
    const CANCEL_REASON = 'cancel_reason';
    const CANCELLED_AT = 'cancelled_at';
    const CART_TOKEN = 'cart_token';
    const CLIENT_DETAILS = 'cart_details';
    const CLOSED_AT = 'closed_at';
    const CREATED_AT = 'created_at';
    const CURRENCY = 'currency';
    const CUSTOMER = 'customer';
    const CUSTOMER_LOCALE = 'customer_locale';
    const DISCOUNT_CODES = 'discount_codes';
    const EMAIL = 'email';
    const CONTACT_EMAIL = 'contact_email';
    const FINANCIAL_STATUS = 'financial_status';
    const FULFILLMENTS = 'fulfillments';
    const FULFILLMENT_STATUS = 'fulfillment_status';
    const TAGS = 'tags';
    const GATEWAY = 'gateway';
    const ID = 'id';
    const LANDING_SITE = 'landing_site';
    const LINE_ITEMS = 'line_items';
    const LOCATION_ID = 'location_id';
    const NAME = 'name';
    const NOTE = 'note';
    const NOTE_ATTRIBUTES = 'note_attributes';
    const NUMBER = 'number';
    const ORDER_NUMBER = 'order_number';
    const PAYMENT_DETAILS = 'payment_details';
    const PAYMENT_GATEWAY_NAMES = 'payment_gateway_names';
    const PHONE = 'phone';
    consT PROCESSED_AT = 'processed_at';
    const PROCESSING_METHOD = 'processing_method';
    const REFERRING_SITE = 'referring_site';
    const REFUNDS = 'refunds';
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
    const TOTAL_PRICE_USD = 'total_price_usd';
    const TOTAL_TAX = 'total_tax';
    const TOTAL_WEIGHT = 'total_weight';
    const UPDATED_AT = 'updated_at';
    const USER_ID = 'user_id';
    const ORDER_STATUS_URL = 'order_status_url';

    public function getFieldTypes()
    {
        return array(
            'app_id' => 'string',
            'billing_address' => 'Address',
            'browser_ip' => 'string',
            'buyer_accepts_marketing' => 'boolean',
            'cancel_reason' => 'string',
            'cancelled_at' => 'boolean',
            'cart_token' => 'string',
            'client_details' => 'object',
            'closed_at' => 'DateTime',
            'created_at' => 'DateTime',
            'currency' => 'string',
            'customer' => 'Customer',
            'customer_locale' => 'string',
            'discount_codes' => 'DiscountCode[]',
            'email' => 'string',
            'contact_email' => 'string',
            'financial_status' => 'string',
            'fulfillments' => 'Fulfillment[]',
            'fulfillment_status' => 'string',
            'tags' => 'string',
            'gateway' => 'string',
            'id' => 'integer',
            'landing_site' => 'string',
            'line_items' => 'LineItem[]',
            'location_id' => 'integer',
            'name' => 'string',
            'note' => 'string',
            'note_attributes' => 'array',
            'number' => 'string',
            'order_number' => 'string',
            'payment_details' => 'object',
            'payment_gateway_names' => 'array',
            'phone' => 'string',
            'processed_at' => 'DateTime',
            'processing_method' => 'string',
            'referring_site' => 'string',
            'refunds' => 'Refund[]',
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
            'total_price_usd' => 'string',
            'total_tax' => 'string',
            'total_weight' => 'string',
            'updated_at' => 'DateTime',
            'user_id' => 'integer',
            'order_status_url' => 'string'
        );
    }
}
