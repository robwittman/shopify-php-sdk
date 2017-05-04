<?php
/**
*
* Shopify\Object\AbandonedCheckout
*
* This is used to return abandoned checkouts. A checkout is considered
* abandoned when a customer has entered their billing & shipping info,
* but has yet to complete the purchase.
*
* MIT License
*
* Copyright (c) Rob Wittman 2016
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in all
* copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
* SOFTWARE.
*
*
* @package Shopify
* @author Rob Wittman <rob@ihsdigital.com>
* @license MIT
* @link https://help.shopify.com/api/reference/abandoned_checkouts
*/

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

    public function getAbandoneCheckoutUrl()
    {
        return $this->get('abandoned_checkout_url');
    }

    public function setAbandoneCheckoutUrl($abandoned_checkout_url)
    {
        $this->set('abandoned_checkout_url', $abandoned_checkout_url);
        return $this;
    }

    public function getBillingAddress()
    {
        return $this->get('billing_address');
    }

    public function setBillingAddress($billing_address)
    {
        $this->set('billing_address', $billing_address);
        return $this;
    }

    public function getBuyerAcceptsMarketing()
    {
        return $this->get('buyer_accepts_marketing');
    }

    public function setBuyerAcceptsMarketing($buyer_accepts_marketing)
    {
        $this->set('buyer_accepts_marketing', $buyer_accepts_marketing);
        return $this;
    }

    public function getCancelReason()
    {
        return $this->get('cancel_reason');
    }

    public function setCancelReason($cancel_reason)
    {
        $this->set('cancel_reason', $cancel_reason);
        return $this;
    }

    public function getCartToken()
    {
        return $this->get('cart_token');
    }

    public function setCartToken($cart_token)
    {
        $this->set('cart_token', $cart_token);
        return $this;
    }

    public function getClosedAt()
    {
        return $this->get('closed_at');
    }

    public function setClosedAt($closed_at)
    {
        $this->set('closed_at', $closed_at);
        return $this;
    }

    public function getCompletedAt()
    {
        return $this->get('completed_at');
    }

    public function setCompletedAt($completed_at)
    {
        $this->set('completed_at', $completed_at);
        return $this;
    }

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function setCurrency($currency)
    {
        $this->set('currency', $currency);
        return $this;
    }

    public function getCustomer()
    {
        return $this->get('customer');
    }

    public function setCustomer($customer)
    {
        $this->set('customer', $customer);
        return $this;
    }

    public function getDiscountCodes()
    {
        return $this->get('discount_codes');
    }

    public function setDiscountCodes($discount_codes)
    {
        $this->set('discount_codes', $discount_codes);
        return $this;
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function setEmail($email)
    {
        $this->set('email', $email);
        return $this;
    }

    public function getGateway()
    {
        return $this->get('gateway');
    }

    public function setGateway($gateway)
    {
        $this->set('gateway', $gateway);
        return $this;
    }

    public function getLandingSite()
    {
        return $this->get('landing_site');
    }

    public function setLandingSite($landing_site)
    {
        $this->set('landing_site', $landing_site);
        return $this;
    }

    public function getLineItems()
    {
        return $this->get('line_items');
    }

    public function setLineItems($line_items)
    {
        $this->set('line_items', $line_items);
        return $this;
    }

    public function getNote()
    {
        return $this->get('note');
    }

    public function setNote($note)
    {
        $this->set('note', $note);
        return $this;
    }

    public function getReferringSite()
    {
        return $this->get('referring_site');
    }

    public function setReferringSite($referring_site)
    {
        $this->set('referring_site', $referring_site);
        return $this;
    }

    public function getShippingAddress()
    {
        return $this->get('shipping_address');
    }

    public function setShippingAddress($shipping_address)
    {
        $this->set('shipping_address', $shipping_address);
        return $this;
    }

    public function getShippingLines()
    {
        return $this->get('shipping_lines');
    }

    public function setShippingLines($shipping_lines)
    {
        $this->set('shipping_lines', $shipping_lines);
        return $this;
    }

    public function getSourceName()
    {
        return $this->get('source_name');
    }

    public function setSourceName($source_name)
    {
        $this->set('source_name', $source_name);
        return $this;
    }

    public function getSubtotalPrice()
    {
        return $this->get('subtotal_price');
    }

    public function setSubtotalPrice($subtotal_price)
    {
        $this->set('subtotal_price', $subtotal_price);
        return $this;
    }

    public function getTaxLines()
    {
        return $this->get('tax_lines');
    }

    public function setTaxLines($tax_lines)
    {
        $this->set('tax_lines', $tax_lines);
        return $this;
    }

    public function getTaxesIncluded()
    {
        return $this->get('taxes_included');
    }

    public function setTaxesIncluded($taxes_included)
    {
        $this->set('taxes_included', $taxes_included);
        return $this;
    }

    public function getToken()
    {
        return $this->get('token');
    }

    public function setToken($token)
    {
        $this->set('token', $token);
        return $this;
    }

    public function getTotalDiscounts()
    {
        return $this->get('total_discounts');
    }

    public function setTotalDiscounts($total_discounts)
    {
        $this->set('total_discounts', $total_discounts);
        return $this;
    }

    public function getTotalLineItemsPrice()
    {
        return $this->get('total_line_items_price');
    }

    public function setTotalLineItemsPrice($total_line_items_price)
    {
        $this->set('total_line_items_price', $total_line_items_price);
        return $this;
    }

    public function getTotalPrice()
    {
        return $this->get('total_price');
    }

    public function setTotalPrice($total_price)
    {
        $this->set('total_price', $total_price);
        return $this;
    }

    public function getTotalTax()
    {
        return $this->get('total_tax');
    }

    public function setTotalTax($total_tax)
    {
        $this->set('total_tax', $total_tax);
        return $this;
    }

    public function getTotalWeight()
    {
        return $this->get('total_weight');
    }

    public function setTotalWeight($total_weight)
    {
        $this->set('total_weight', $total_weight);
        return $this;
    }
}
