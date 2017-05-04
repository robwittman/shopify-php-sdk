<?php
/**
 *
 * Shopify\Object\Customer
 *
 * A customer resource instance represents a customer account with the shop.
 * Customer accounts store contact information for the customer, saving logged-in
 * customers the trouble of having to provide it at every checkout. For security
 * reasons, the customer resource instance does not store credit card information.
 * Customers will always have to provide this information at checkout.
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
 * @link https://help.shopify.com/api/reference/customer
 */
namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Concerns\HasMetafields;
use Shopify\Object\Address;

class Customer extends AbstractObject
{
    use HasTimestamps,
        HasMetafields,
        HasId;

    /**
     * Indicates whether the customer has consented to be sent marketing material
     * via email. Valid values are "true" and "false."
     * @var boolean
     */
    protected $accepts_marketing;

    /**
     * A list of addresses for the customer
     * @var Address[]
     */
    protected $addresses;

    /**
     * The default address for the customer.
     * @var Address
     */
    protected $default_address;

    /**
     * The email address of the customer.
     * @var string
     */
    protected $email;

    /**
     * The phone number for the customer.
     * @var string
     */
    protected $phone;

    /**
     * The customer's first name.
     * @var string
     */
    protected $first_name;

    /**
     * The customer's identifier used with Multipass login
     * @var string
     */
    protected $multipass_identifier;

    /**
     * The customer's last name.
     * @var string
     */
    protected $last_name;

    /**
     * The id of the customer's last order.
     * @var integer
     */
    protected $last_order_id;

    /**
     * The name of the customer's last order. This is directly related to
     * the Order's name field.
     * @var string
     */
    protected $last_order_name;

    /**
     * A note about the customer.
     * @var string
     */
    protected $note;

    /**
     * The number of orders associated with this customer.
     * @var integer
     */
    protected $orders_count;

    /**
     * The state of the customer's account in a shop
     * @var string
     */
    protected $state;

    /**
     * Tags are additional short descriptors formatted as a string of comma-separated values
     * @var string
     */
    protected $tags;

    /**
     * Indicates whether the customer should be charged taxes when placing orders.
     * Valid values are "true" and "false."
     * @var boolean
     */
    protected $tax_exempt;

    /**
     * The total amount of money that the customer has spent at the shop.
     * @var string
     */
    protected $total_spent;

    /**
     * States whether or not the email address has been verified.
     * @var boolean
     */
    protected $verified_email;

    public function getAcceptsMarketing()
    {
        return $this->get('accepts_marketing');
    }

    public function setAcceptsMarketing($accepts_marketing)
    {
        $this->set('accepts_marketing', $accepts_marketing);
        return $this;
    }

    public function getBodyHtml()
    {
        return $this->get('body_html');
    }

    public function setBodyHtml($body_html)
    {
        $this->set('body_html', $body_html);
        return $this;
    }

    public function getAddresses()
    {
        return $this->get('addresses');
    }

    public function setAddresses($addresses)
    {
        $this->set('addresses', $addresses);
        return $this;
    }

    public function getDefaultAddress()
    {
        return $this->get('default_address');
    }

    public function setDefaultAddress($default_address)
    {
        $this->set('default_address', $default_address);
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

    public function getPhone()
    {
        return $this->get('phone');
    }

    public function setPhone($phone)
    {
        $this->set('phone', $phone);
        return $this;
    }

    public function getFirstName()
    {
        return $this->get('first_name');
    }

    public function setFirstName($first_name)
    {
        $this->set('first_name', $first_name);
        return $this;
    }

    public function getMultipassI()
    {
        return $this->get('multipass_identifier');
    }

    public function setMultipassI($multipass_identifier)
    {
        $this->set('multipass_identifier', $multipass_identifier);
        return $this;
    }

    public function getLastName()
    {
        return $this->get('last_name');
    }

    public function setLastName($last_name)
    {
        $this->set('last_name', $last_name);
        return $this;
    }

    public function getLastOrderId()
    {
        return $this->get('last_order_id');
    }

    public function setLastOrderId($last_order_id)
    {
        $this->set('last_order_id', $last_order_id);
        return $this;
    }

    public function getLastOrderName()
    {
        return $this->get('last_order_name');
    }

    public function setLastOrderName($last_order_name)
    {
        $this->set('last_order_name', $last_order_name);
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

    public function getOrdersCount()
    {
        return $this->get('orders_count');
    }

    public function setOrdersCount($orders_count)
    {
        $this->set('orders_count', $orders_count);
        return $this;
    }

    public function getState()
    {
        return $this->get('state');
    }

    public function setState($state)
    {
        $this->set('state', $state);
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

    public function getTaxExempt()
    {
        return $this->get('tax_exempt');
    }

    public function setTaxExempt($tax_exempt)
    {
        $this->set('tax_exempt', $tax_exempt);
        return $this;
    }

    public function getTotalSpent()
    {
        return $this->get('total_spent');
    }

    public function setTotalSpent($total_spent)
    {
        $this->set('total_spent', $total_spent);
        return $this;
    }

    public function getVerifiedEmail()
    {
        return $this->get('verified_email');
    }

    public function setVerifiedEmail($verified_email)
    {
        $this->set('verified_email', $verified_email);
        return $this;
    }
}
