<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;
use Shopify\Concerns\HasTimestamps;
class AbandonedCheckout extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The full recovery URL to be sent to a customer to recover their abandoned checkout.
     * @var string
     */
    protected $abandoned_checkout_url;

    /**
     * The mailing address associated with the payment method. It has the following properties:
     * @var string
     */
    protected $billing_address;

    /**
     * Indicates whether or not the person who placed the order would like to
     * receive email updates from the shop. This is set when checking the
     * "I want to receive occasional emails about new products, promotions and
     * other news" checkbox during checkout. Valid values are "true" and "false."
     * @var boolean
     */
    protected $buyer_accepts_marketing;

    /**
     * The reason why the order was cancelled. If the order was not cancelled,
     * this value is "null." If the order was cancelled, the value will be one of the following:
     * customer, fraud, inventory, other
     * @var string
     */
    protected $cancel_reason;

    /**
     * Unique identifier for a particular cart that is attached to a particular order.
     * @var string
     */
    protected $cart_token;

    /**
     * The date and time when the order was closed. If the order was closed,
     * the API returns this value in ISO 8601 format. If the order was not closed,
     * this value is null.
     * @var string
     */
    protected $closed_at;

    /**
     * @var string
     */
    protected $completed_at;

    /**
     * The three letter code (ISO 4217) for the currency used for the payment.
     * @var string
     */
    protected $currency;

    /**
     * An object containing information about the customer. It contains the following fields:
     * @var Customer
     */
    protected $customer;

    /**
     * Applicable discount codes that can be applied to the order. If no codes exist the value will default to blank.
     * @var DiscountCode[]
     */
    protected $discount_codes;

    /**
     * The customer's email address.
     * @var string
     */
    protected $email;

    /**
     * The payment gateway used.
     * @var string
     */
    protected $gateway;

    /**
     * The URL for the page where the buyer landed when entering the shop.
     * @var string
     */
    protected $landing_site;

    /**
     * A list of line item objects, each one containing information about an item in the order
     * @var LineItem[]
     */
    protected $line_items;

    /**
     * The text of an optional note that a shop owner can attach to the order.
     * @var string
     */
    protected $note;

    /**
     * The website that the customer clicked on to come to the shop.
     * @var string
     */
    protected $referring_site;

    /**
     * The mailing address to where the order will be shipped.
     * @var Address
     */
    protected $shipping_address;

    /**
     * An array of shipping_line objects, each of which details the shipping methods used
     * @var array
     */
    protected $shipping_lines;

    /**
     * Where the checkout originated. Possible values are:
     * "web", "pos", "iphone", and "android"
     * @var string
     */
    protected $source_name;

    /**
     * Price of the order before shipping and taxes
     * @var float
     */
    protected $subtotal_price;

    /**
     * An array of tax_line objects, each of which details the taxes applicable to the order
     * @var array
     */
    protected $tax_lines;

    /**
     * @var boolean
     */
    protected $taxes_included;

    /**
     * Unique identifier for a particular order.
     * @var string
     */
    protected $token;

    /**
     * The total amount of the discounts to be applied to the price of the order.
     * @var float
     */
    protected $total_discounts;

    /**
     * The sum of all the prices of all the items in the order.
     * @var float
     */
    protected $total_line_items_price;

    /**
     * The sum of all the prices of all the items in the order, taxes and discounts included.
     * @var float
     */
    protected $total_price;

    /**
     * The sum of all the taxes applied to the line items in the order.
     * @var float
     */
    protected $total_tax;

    /**
     * The sum of all the weights of the line items in the order, in grams.
     * @var integer
     */
    protected $total_weight;
}
