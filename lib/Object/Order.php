<?php
/**
 *
 * Shopify\Object\Order
 *
 * An order is a customer's completed request to purchase one or more products
 * from a shop. An order is created when a customer completes the checkout process,
 * during which time s/he provides an email address, billing address and payment information.
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
 * @package Shopify
 * @author Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/order
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Object\Address;
use Shopify\Object\Customer;
use Shopify\Object\Discount;
use Shopify\Object\Fulfillment;
use Shopify\Object\Refund;

class Order extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The mailing address associated with the payment method.
     * @var Address
     */
    protected $billing_address;

    /**
     * The IP address of the browser used by the customer when placing the order.
     * @var string
     */
    protected $browser_ip;

    /**
     * Indicates whether or not the person who placed the order would like to
     * receive email updates from the shop. This is set when checking the "I want
     * to receive occasional emails about new products, promotions and other news"
     * checkbox during checkout. Valid values are "true" and "false."
     * @var boolean
     */
    protected $buyer_accepts_marketing;

    /**
     * The reason why the order was cancelled. If the order was not cancelled, this value is "null."
     * @var string
     */
    protected $cancel_reason;

    /**
     * The date and time when the order was cancelled. If the order was cancelled,
     * the API returns this value in ISO 8601 format. If the order was not cancelled, this value is "null."
     * @var string
     */
    protected $cancelled_at;

    /**
     * Unique identifier for a particular cart that is attached to a particular order.
     * @var string
     */
    protected $cart_token;

    /**
     * An object containing information about the client:
     * @var array
     */
    protected $client_details;

    /**
     * The date and time when the order was closed. If the order was closed,
     * the API returns this value in ISO 8601 format. If the order was not closed, this value is null.
     * @var string
     */
    protected $closed_at;

    /**
     * The three letter code (ISO 4217) for the currency used for the payment.
     * @var string
     */
    protected $currency;

    /**
     * An object containing information about the customer. It is important to
     * note that the order may not have a customer and consumers should not depend
     * n the existence of a customer object. This value may be null if the order
     * was created through Shopify POS
     * @var Customer
     */
    protected $customer;

    /**
     * Applicable discount codes that can be applied to the order. If no codes exist the value will default to blank.
     * @var Discount
     */
    protected $discount_codes;

    /**
     * The customer's email address. Is required when a billing address is present.
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $financial_status;

    /**
     * @var Fulfillment[]
     */
    protected $fulfillments;

    /**
     * @var string
     */
    protected $fulfillment_status;

    /**
     * Tags are additional short descriptors, commonly used for filtering and
     * searching, formatted as a string of comma-separated values.
     * @var string
     */
    protected $tags;

    /**
     * Deprecated as of July 14, 2014. This information is instead available on transactions
     * The payment gateway used.
     * @deprecated
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
     * Only present on orders processed at point of sale. The unique numeric
     * identifier for the physical location at which the order was processed.
     * @var integer
     */
    protected $location_id;

    /**
     * The customer's order name as represented by a number.
     * @var string
     */
    protected $name;

    /**
     * The text of an optional note that a shop owner can attach to the order.
     * @var string
     */
    protected $note;

    /**
     * Extra information that is added to the order. Each array entry must contain
     * a hash with "name" and "value" keys as shown above.
     * @var object
     */
    protected $note_attributes;

    /**
     * Numerical identifier unique to the shop. A number is sequential and starts at 1000.
     * @var integer
     */
    protected $number;

    /**
     * A unique numeric identifier for the order. This one is used by the shop owner and customer.
     * This is different from the id property, which is also a unique numeric identifier
     * for the order, but used for API purposes.
     * @var integer
     */
    protected $order_number;

    /**
     * Deprecated as of July 7, 2014. This information is instead available on
     * transactions An object containing information about the payment.
     * @deprecated
     * @var object
     */
    protected $payment_details;

    /**
     * The list of all payment gateways used for the order.
     * @var array
     */
    protected $payment_gateway_names;

    /**
     * The date and time when the order was imported, in ISO 8601 format.
     * This value can be set to dates in the past when importing from other systems.
     * If no value is provided, it will be auto-generated based on the current
     * date and time in Shopify.
     * @var string
     */
    protected $processed_at;

    /**
     * States the type of payment processing method. Valid values are: checkout,
     * direct, manual, offsite or express.
     * @var string
     */
    protected $processing_method;

    /**
     * The website that the customer clicked on to come to the shop.
     * @var string
     */
    protected $referring_site;

    /**
     * The list of refunds applied to the order.
     * @var Refund[]
     */
    protected $refunds;

    /**
     * The mailing address to where the order will be shipped.
     * @var Address[]
     */
    protected $shipping_address;

    /**
     * An array of shipping_line objects, each of which details the shipping methods used.
     * @var array
     */
    protected $shipping_lines;

    /**
     * Where the order originated. May only be set during creation, and is not
     * writeable thereafter. Orders created through official Shopify channels have
     * protected values that cannot be assigned by other API clients during order
     * creation. These protected values are: "web", "pos", "iphone", and "android"
     * Orders created via the API may be assigned any other string of your choice.
     * If source_name is unspecified, new orders are assigned the value "api".
     * @var string
     */
    protected $source_name;

    /**
     * Price of the order before shipping and taxes
     * @var float
     */
    protected $subtotal_price;

    /**
     * An array of tax_line objects, each of which details the total taxes applicable to the order.
     * @var array
     */
    protected $tax_lines;

    /**
     * States whether or not taxes are included in the order subtotal. Valid values are "true" or "false"
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
     * @var string
     */
    protected $total_discounts;

    /**
     * The sum of all the prices of all the items in the order.
     * @var string
     */
    protected $total_line_items_price;

    /**
     * The sum of all the prices of all the items in the order, taxes and discounts
     * included (must be positive).
     * @var string
     */
    protected $total_price;

    /**
     * The sum of all the taxes applied to the order (must be positive).
     * @var string
     */
    protected $total_tax;

    /**
     * The sum of all the weights of the line items in the order, in grams.
     * @var integer
     */
    protected $total_weight;

    /**
     * Only present on orders processed at point of sale. The unique numerical
     * identifier for the user logged into the terminal at the time the order was
     * processed at.
     * @var string
     */
    protected $user_id;

    /**
     * The URL pointing to the order status web page.
     * The URL will be null unless the order was created from a checkout.
     * @var string
     */
    protected $order_status_url;

    public function getBillingAddress()
    {
        return $this->get('billing_address');
    }

    public function setBillingAddress($billing_address)
    {
        $this->set('billing_address', $billing_address);
        return $this;
    }

    public function getBrowserIp()
    {
        return $this->get('browser_ip');
    }

    public function setBrowserIp($browser_ip)
    {
        $this->set('browser_ip', $browser_ip);
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

    public function getCancelledAt()
    {
        return $this->get('cancelled_at');
    }

    public function setCancelledAt($cancelled_at)
    {
        $this->set('cancelled_at', $cancelled_at);
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

    public function getClientDetails()
    {
        return $this->get('client_details');
    }

    public function setClientDetails($client_details)
    {
        $this->set('client_details', $client_details);
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

    public function getFinancialStatus()
    {
        return $this->get('financial_status');
    }

    public function setFinancialStatus($financial_status)
    {
        $this->set('financial_status', $financial_status);
        return $this;
    }

    public function getFulfillments()
    {
        return $this->get('fulfillments');
    }

    public function setFulfillments($fulfillments)
    {
        $this->set('fulfillments', $fulfillments);
        return $this;
    }

    public function getFulfillmentStatus()
    {
        return $this->get('fulfillment_status');
    }

    public function setFulfillmentStatus($fulfillment_status)
    {
        $this->set('fulfillment_status', $fulfillment_status);
        return $this;
    }

    public function getTags()
    {
        return $this->get('tags');
    }

    public function setTags($tags)
    {
        $this->set('tags', $tags);
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

    public function getLocationId()
    {
        return $this->get('location_id');
    }

    public function setLocationId($location_id)
    {
        $this->set('location_id', $location_id);
        return $this;
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
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

    public function getNoteAttributes()
    {
        return $this->get('note_attributes');
    }

    public function setNoteAttributes($note_attributes)
    {
        $this->set('note_attributes', $note_attributes);
        return $this;
    }

    public function getNumber()
    {
        return $this->get('number');
    }

    public function setNumber($number)
    {
        $this->set('number', $number);
        return $this;
    }

    public function getOrderNumber()
    {
        return $this->get('order_number');
    }

    public function setOrderNumber($order_number)
    {
        $this->set('order_number', $order_number);
        return $this;
    }

    public function getPaymentDetails()
    {
        return $this->get('payment_details');
    }

    public function setPaymentDetails($payment_details)
    {
        $this->set('payment_details', $payment_details);
        return $this;
    }

    public function getPaymentGatewayNames()
    {
        return $this->get('payment_gateway_names');
    }

    public function setPaymentGatewayNames($payment_gateway_names)
    {
        $this->set('payment_gateway_names', $payment_gateway_names);
        return $this;
    }

    public function getProcessedAt()
    {
        return $this->get('processed_at');
    }

    public function setProcessedAt($processed_at)
    {
        $this->set('processed_at', $processed_at);
        return $this;
    }

    public function getProcessingMethod()
    {
        return $this->get('processing_method');
    }

    public function setProcessingMethod($processing_method)
    {
        $this->set('processing_method', $processing_method);
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

    public function getRefunds()
    {
        return $this->get('refunds');
    }

    public function setRefunds($refunds)
    {
        $this->set('refunds', $refunds);
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

    public function getUserId()
    {
        return $this->get('user_id');
    }

    public function setUserId($user_id)
    {
        $this->set('user_id', $user_id);
        return $this;
    }

    public function getOrderStatusUrl()
    {
        return $this->get('order_status_url');
    }

    public function setOrderStatusUrl($order_status_url)
    {
        $this->set('order_status_url', $order_status_url);
        return $this;
    }
}
