<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;
use Shopify\Concerns\HasTimestamps;

class Checkout extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $billing_address;
    protected $currency;
    protected $customer_id;
    protected $discount_code;
    protected $applied_discount;
    protected $email;
    protected $gift_cards;
    protected $line_items;
    protected $requires_shipping;
    protected $shipping_address;
    protected $shipping_rates;
    protected $shipping_rate;
    protected $shipping_line;
    protected $subtotal_price;
    protected $tax_lines;
    protected $taxes_included;
    protected $token;
    protected $total_price;
    protected $total_tax;
    protected $order;
    protected $user_id;
    protected $web_url;
    protected $reservation_tile;
    protected $reservation_time_left;
    protected $source_name;
    protected $payment_due;
    protected $request_details;
}
