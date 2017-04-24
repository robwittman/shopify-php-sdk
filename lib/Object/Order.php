<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Order extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $billing_address;
    protected $browser_ip;
    protected $buyer_accepts_marketing;
    protected $cancel_reason;
    protected $cancelled_at;
    protected $cart_token;
    protected $client_details;
    protected $closed_at;
    protected $currency;
    protected $customer;
    protected $discount_codes;
    protected $email;
    protected $financial_status;
    protected $fulfillments;
    protected $fulfillment_status;
    protected $tags;
    protected $gateway;
    protected $landing_site;
    protected $line_items;
    protected $location_id;
    protected $name;
    protected $note;
    protected $note_attributes;
    protected $number;
    protected $order_number;
    protected $payment_details;
    protected $payment_gateway_names;
    protected $processed_at;
    protected $processing_method;
    protected $referring_site;
    protected $refunds;
    protected $shipping_address;
    protected $shipping_lines;
    protected $source_name;
    protected $subtotal_price;
    protected $tax_lines;
    protected $taxes_included;
    protected $token;
    protected $total_discounts;
    protected $total_line_items_price;
    protected $total_price;
    protected $total_tax;
    protected $total_weight;
    protected $user_id;
    protected $order_status_url;
}
