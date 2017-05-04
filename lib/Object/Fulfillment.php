<?php
/**
 *
 * Shopify\Object\Fulfillment
 *
 * A fulfillment represents a shipment of one or more items in an order. When
 * we say that an order has been completely fulfilled, we mean that all the items
 * that make up that order have been sent to the customer.
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
 * @link https://help.shopify.com/api/reference/fulfillment
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Fulfillment extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * A historical record of each item in the fulfillment:
     * @var LineItem[]
     */
    protected $line_items;

    /**
     * A flag indicating whether the customer should be notified. If set to true,
     * an email will be sent when the fulfillment is created or updated. The
     * default value is true. If you don't specify a value, the customer will
     * receive an email.
     * @var boolean
     */
    protected $notify_customer;

    /**
     * The unique numeric identifier for the order.
     * @var integer
     */
    protected $order_id;

    /**
     * Text field that provides information about the receipt:
     * @var string
     */
    protected $receipt;

    /**
     * The status of the fulfillment
     * @var string
     */
    protected $status;

    /**
     * The name of the tracking company.
     * @var string
     */
    protected $tracking_company;

    /**
     * A list of tracking numbers, provided by the shipping company.
     * @var array
     */
    protected $tracking_numbers;

    /**
     * The URLs to track the fulfillment.
     * @var array
     */
    protected $tracking_urls;

    /**
     * States the name of the inventory management service.
     * @var string
     */
    protected $variant_inventory_management;

    public function getLineItems()
    {
        return $this->get('line_items');
    }

    public function setLineItems($line_items)
    {
        $this->set('line_items', $line_items);
        return $this;
    }

    public function getNotifyCustomer()
    {
        return $this->get('notify_customer');
    }

    public function setNotifyCustomer($notify_customer)
    {
        $this->set('notify_customer', $notify_customer);
        return $this;
    }

    public function getOrderId()
    {
        return $this->get('order_id');
    }

    public function setOrderId($order_id)
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

    public function getStatus()
    {
        return $this->get('status');
    }

    public function setStatus($status)
    {
        $this->set('status', $status);
        return $this;
    }

    public function getTrackingCompany()
    {
        return $this->get('tracking_compeny');
    }

    public function setTrackingCompany($tracking_compeny)
    {
        $this->set('tracking_compeny', $tracking_compeny);
        return $this;
    }

    public function getTrackingNumbers()
    {
        return $this->get('tracking_numbers');
    }

    public function setTrackingNumbers($tracking_numbers)
    {
        $this->set('tracking_numbers', $tracking_numbers);
        return $this;
    }

    public function getTrackingUrls()
    {
        return $this->get('tracking_urls');
    }

    public function setTrackingUrls($tracking_urls)
    {
        $this->set('tracking_urls', $tracking_urls);
        return $this;
    }

    public function getVariantInventoryManagement()
    {
        return $this->get('variant_inventory_management');
    }

    public function setVariantInventoryManagement($variant_inventory_management)
    {
        $this->set('variant_inventory_management', $variant_inventory_management);
        return $this;
    }
}
