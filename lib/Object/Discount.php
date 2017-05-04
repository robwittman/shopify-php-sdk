<?php
/**
 *
 * Shopify\Object\Discount
 *
 * Discounts (or discount codes) can be created, disabled, enabled and destroyed
 * through the Shopify API.
 *
 * A merchant's customers can enter the discount code during the checkout process
 * to redeem percentage-based, fixed amount, or free shipping discounts on a
 * specific product, collection or order. Usually, discount codes are delivered
 * to a customer by the merchant through an email marketing campaign, direct email,
 * or offline marketing.
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
 * @link https://help.shopify.com/api/reference/discount
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Discount extends AbstractObject
{
    use HasId;

    /**
     * Specify how the discount's value will be applied to the order
     * @var string
     */
    protected $discount_type;

    /**
     * The case-insensitive discount code that customers use at checkout.
     * Required when creating a discount. Maximum length of 255 characters.
     * @var string
     */
    protected $code;

    /**
     * The value of the discount. Required when creating a percentage-based or
     * fixed-amount discount. See the discount_type property to learn more about
     * how value is interpreted.
     * @var string
     */
    protected $value;

    /**
     * The date when the discount code becomes disabled in ISO 8601 format.
     * @var string
     */
    protected $ends_at;

    /**
     * The date the discount becomes valid for use during checkout in ISO 8601 format.
     * @var string
     */
    protected $starts_at;

    /**
     * The status of the discount code. Valid values are enabled, disabled, or depleted.
     * @var string
     */
    protected $status;

    /**
     * The minimum value an order must reach for the discount to be allowed during checkout.
     * @var string
     */
    protected $minimum_order_amount;

    /**
     * The number of times this discount code can be redeemed. It can be redeemed by
     * one or many customers; the usage_limit is a store-wide absolute value.
     * Leave blank for unlimited uses.
     * @var integer
     */
    protected $usage_limit;

    /**
     * The id of a collection or product that this discount code is restricted to.
     * Leave blank for a store-wide discount. If applies_to_id is set, then the
     * applies_to_resource property is also mandatory.
     * @var string
     */
    protected $applies_to_id;

    /**
     * When a discount applies to a product or collection resource, applies_once
     * determines whether the discount should be applied once per order, or to
     * every applicable item in the cart.
     * @var boolean
     */
    protected $applies_once;

    /**
     * Determines whether the discount should be applied once, or any number of times per customer.
     * @var boolean
     */
    protected $applies_once_per_customer;

    /**
     * The discount code can be set to apply to only a product, smart_collection,
     * customersavedsearch or custom_collection. If applies_to_resource is set,
     * then applies_to_id should also be set.
     * @var string
     */
    protected $applies_to_resource;

    /**
     * Returns a count of successful checkouts where the discount code has been used.
     * Cannot exceed the usage_limit property.
     * @var integer
     */
    protected $times_used;

    public function getDiscountType()
    {
        return $this->get('discount_type');
    }

    public function setDiscountType($discount_type)
    {
        $this->set('discount_type', $discount_type);
        return $this;
    }

    public function getCode()
    {
        return $this->get('code');
    }

    public function setCode($code)
    {
        $this->set('code', $code);
        return $this;
    }

    public function getValue()
    {
        return $this->get('value');
    }

    public function setValue($value)
    {
        $this->set('value', $value);
        return $this;
    }

    public function getEndsAt()
    {
        return $this->get('ends_at');
    }

    public function setEndsAt($ends_at)
    {
        $this->set('ends_at', $ends_at);
        return $this;
    }

    public function getStartsAt()
    {
        return $this->get('starts_at');
    }

    public function setStartsAt($starts_at)
    {
        $this->set('starts_at', $starts_at);
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

    public function getMinimumOrderAmount()
    {
        return $this->get('minimum_order_amount');
    }

    public function setMinimumOrderAmount($minimum_order_amount)
    {
        $this->set('minimum_order_amount', $minimum_order_amount);
        return $this;
    }

    public function getUsageLimie()
    {
        return $this->get('usage_limit');
    }

    public function setUsageLimie($usage_limit)
    {
        $this->set('usage_limit', $usage_limit);
        return $this;
    }

    public function getAppliesToId()
    {
        return $this->get('applies_to_id');
    }

    public function setAppliesToId($applies_to_id)
    {
        $this->set('applies_to_id', $applies_to_id);
        return $this;
    }

    public function getAppliesOnce()
    {
        return $this->get('applies_once');
    }

    public function setAppliesOnce($applies_once)
    {
        $this->set('applies_once', $applies_once);
        return $this;
    }

    public function getAppliesOncePerCustomer()
    {
        return $this->get('applies_once_per_customer');
    }

    public function setAppliesOncePerCustomer($applies_once_per_customer)
    {
        $this->set('applies_once_per_customer', $applies_once_per_customer);
        return $this;
    }

    public function getAppliesToResource()
    {
        return $this->get('applies_to_resource');
    }

    public function setAppliesToResource($applies_to_resource)
    {
        $this->set('applies_to_resource', $applies_to_resource);
        return $this;
    }

    public function getTimesUsed()
    {
        return $this->get('times_used');
    }

    public function setTimesUsed($times_used)
    {
        $this->set('times_used', $times_used);
        return $this;
    }
}
