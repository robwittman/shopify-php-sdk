<?php
/**
 *
 * Shopify\Object\Transaction
 *
 * Transactions are created for every order that results in an exchange of money.
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
 * @link https://help.shopify.com/api/reference/transaction
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Transaction extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The amount of money that the transaction was for.
     * @var string
     */
    protected $amount;

    /**
     * The authorization code associated with the transaction.
     * @var string
     */
    protected $authorization;

    /**
     * The unique identifier for the device.
     * @var integer
     */
    protected $device_id;

    /**
     * The name of the gateway the transaction was issued through.
     * @see https://www.shopify.com/payment-gateways
     * @var string
     */
    protected $gateway;

    /**
     * The origin of the transaction. This is set by Shopify and cannot be overridden.
     * Example values include: 'web', 'pos', 'iphone', 'android'
     * @var string
     */
    protected $source_name;

    /**
     * An object containing information about the credit card used for this transaction
     * @var object
     */
    protected $payment_details;

    /**
     * The kind of transaction:
     * @var string
     */
    protected $kind;

    /**
     * A unique numeric identifier for the order.
     * @var integer
     */
    protected $order_id;

    /**
     * A transaction reciept attached to the transaction by the gateway.
     * The value of this field will vary depending on which gateway the shop is using.
     * @var object
     */
    protected $receipt;

    /**
     * A standardized error code, independent of the payment provider.
     * @var string
     */
    protected $error_code;

    /**
     * The status of the transaction. Valid values are: pending, failure, success or error.
     * @var string
     */
    protected $status;

    /**
     * The option to use the transaction for testing purposes. Valid values are "true" or "false."
     * @var boolean
     */
    protected $test;

    /**
     * The unique identifier for the user.
     * @var integer
     */
    protected $user_id;

    /**
     * The three letter code (ISO 4217) for the currency used for the payment.
     * @var string
     */
    protected $currency;

    public function getAmount()
    {
        return $this->get('amount');
    }

    public function setAmount($amount)
    {
        $this->set('amount', $amount);
        return $this;
    }

    public function getAuthorization()
    {
        return $this->get('authorizations');
    }

    public function setAuthorization($authorizations)
    {
        $this->set('authorizations', $authorizations);
        return $this;
    }

    public function getDeviceId()
    {
        return $this->get('device_id');
    }

    public function setDeviceId($device_id)
    {
        $this->set('device_id', $device_id);
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

    public function getSourceName()
    {
        return $this->get('source_name');
    }

    public function setSourceName($source_name)
    {
        $this->set('source_name', $source_name);
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

    public function getKind()
    {
        return $this->get('kind');
    }

    public function setKind($kind)
    {
        $this->set('kind', $kind);
        return $this;
    }

    public function getOrerId()
    {
        return $this->get('order_id');
    }

    public function setOrerId($order_id)
    {
        $this->set('order_id', $order_id);
        return $this;
    }

    public function getReceipt()
    {
        return $this->get('receipt');
    }

    public function setReceipt($receipt)
    {
        $this->set('receipt', $receipt);
        return $this;
    }

    public function getErrorCode()
    {
        return $this->get('error_code');
    }

    public function setErrorCode($error_code)
    {
        $this->set('error_code', $error_code);
        return $this;
    }

    public function getStatus()
    {
        return $this->get('status');
    }

    public function setStatus($status)
    {
        $this->set('status', $status);
        return $this;
    }

    public function getTest()
    {
        return $this->get('test');
    }

    public function setTest($test)
    {
        $this->set('test', $test);
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

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function setCurrency($currency)
    {
        $this->set('currency', $currency);
        return $this;
    }
}
