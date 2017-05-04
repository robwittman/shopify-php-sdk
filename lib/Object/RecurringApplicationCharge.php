<?php
/**
 *
 * Shopify\Object\RecurringApplicationCharge
 *
 * Request to charge a shop a recurring fee (every 30 days) by issuing this call
 * with the name the charge should appear under (on the shop owner’s invoice),
 * the price your application is charging, and a return_url to where Shopify will
 * redirect the shop owner to after they have accepted or declined the charge.
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
 * @link https://help.shopify.com/api/reference/recurringapplicationcharge
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class RecurringApplicationCharge extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The date and time when the customer activated the recurring application charge.
     * The API returns this value in ISO 8601 format.
     * Note: The recurring application charge must be activated or the returning value will be "null".
     * @var string
     */
    protected $activated_on;

    /**
     * The date and time when the customer will be billed. The API returns this
     * value in ISO 8601 format.
     * Note: The recurring application charge must be accepted or the returning value will be "null".
     * @var string
     */
    protected $billing_on;

    /**
     * The date and time when the customer cancelled their recurring application charge.
     * The API returns this value in ISO 8601 format.
     * Note: If the recurring application charge is not cancelled it will default to "null".
     * @var string
     */
    protected $cancelled_on;

    /**
     * The capped amount is the limit a customer can be charged for usage based billing.
     * Please see usage charges for more information.
     * @var string
     */
    protected $capped_amount;

    /**
     * The URL that the customer is taken to, to accept or decline the recurring application charge.
     * @var string
     */
    protected $confirmation_url;

    /**
     * The name of the recurring application charge.
     * @var string
     */
    protected $name;

    /**
     * The price of the recurring application charge.
     * @var string
     */
    protected $price;

    /**
     * The URL the customer is sent to once they accept/decline a charge.
     * @var string
     */
    protected $return_url;

    /**
     * The status of the recurring charge
     * @var string
     */
    protected $status;

    /**
     * States the terms and conditions of usage based billing charges. Must be
     * present in order to create usage charges. These are presented to the merchant
     * when they approve the usage charges for your app.
     * @var string
     */
    protected $terms;

    /**
     * States whether or not the application charge is a test transaction.
     * Valid values are "true" or "null".
     * @var string
     */
    protected $test;

    /**
     * Number of days that the customer is eligible for a free trial.
     * @var integer
     */
    protected $trial_days;

    /**
     * The date and time when the free trial ends. The API returns this value in ISO 8601 format.
     * @var string
     */
    protected $trial_ends_on;

    public function getActivatedOn()
    {
        return $this->get('activated_on');
    }

    public function setActivatedOn($activated_on)
    {
        $this->set('activated_on', $activated_on);
        return $this;
    }

    public function getBillingOn()
    {
        return $this->get('billing_on');
    }

    public function setBillingOn($billing_on)
    {
        $this->set('billing_on', $billing_on);
        return $this;
    }

    public function getCancelledOn()
    {
        return $this->get('cancelled_on');
    }

    public function setCancelledOn($cancelled_on)
    {
        $this->set('cancelled_on', $cancelled_on);
        return $this;
    }

    public function getCappedAmount()
    {
        return $this->get('capped_amount');
    }

    public function setCappedAmount($capped_amount)
    {
        $this->set('capped_amount', $capped_amount);
        return $this;
    }

    public function getConfirmationUrl()
    {
        return $this->get('confirmation_url');
    }

    public function setConfirmationUrl($confirmation_url)
    {
        $this->set('confirmation_url', $confirmation_url);
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

    public function getPrice()
    {
        return $this->get('price');
    }

    public function setPrice($price)
    {
        $this->set('price', $price);
        return $this;
    }

    public function getReturnUrl()
    {
        return $this->get('return_url');
    }

    public function setReturnUrl($return_url)
    {
        $this->set('return_url', $return_url);
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

    public function getTerms()
    {
        return $this->get('terms');
    }

    public function setTerms($terms)
    {
        $this->set('terms', $terms);
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

    public function getTrialDays()
    {
        return $this->get('trial_days');
    }

    public function setTrialDays($trial_days)
    {
        $this->set('trial_days', $trial_days);
        return $this;
    }

    public function getTrialEndsOn()
    {
        return $this->get('trial_ends_on');
    }

    public function setTrialEndsOn($trial_ends_on)
    {
        $this->set('trial_ends_on', $trial_ends_on);
        return $this;
    }
}
