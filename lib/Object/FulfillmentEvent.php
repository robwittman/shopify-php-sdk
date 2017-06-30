<?php
/**
 *
 * Shopify\Object\FulfillmentEvent
 *
 * A FulfillmentEvent represents a tracking event belonging to a fulfillment of
 * one or more items in an order. Fulfillment events are displayed on the Order
 * Status Page to update customers on the status of their shipment.
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
 * @link https://help.shopify.com/api/reference/fulfillmentevent
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class FulfillmentEvent extends AbstractObject
{
    use HasTimestamps,
        HasId;

    public static function getApiHandle()
    {
        return 'fulfillment_events';
    }

    /**
     * A numeric unique identifier for the shop to which the fulfillment event belongs.
     * @var integer
     */
    protected $shop_id;

    /**
     * The id of the order the fulfillment event belongs to
     * @var integer
     */
    protected $order_id;

    /**
     * A numeric unique identifier for the fulfillment to which the fulfillment
     * event belongs.
     * @var integer
     */
    protected $fulfillment_id;

    /**
     * The status of the fulfillment event.
     * @var string
     */
    protected $status;

    /**
     * The date and time when the fulfillment event occurred.
     * @var integer
     */
    protected $happened_at;

    /**
     * An arbitrary message describing the status. Can be provided by a shipping carrier.
     * @var string
     */
    protected $message;

    /**
     * The city in which the fulfillment event occurred.
     * @var string
     */
    protected $city;

    /**
     * The province in which the fulfillment event occurred.
     * @var string
     */
    protected $province;

    /**
     * The zip code in the location in which the fulfillment event occurred.
     * @var string
     */
    protected $zip;

    /**
     * The country in which the fulfillment event occurred.
     * @var string
     */
    protected $country;

    /**
     * The fulfillment event's street address.
     * @var string
     */
    protected $address1;

    /**
     * Geographic coordinate specifying the north/south location of a fulfillment event.
     * @var float
     */
    protected $latitude;

    /**
     * Geographic coordinate specifying the east/west location of a fulfillment event.
     * @var float
     */
    protected $longitude;

    public function getShopId()
    {
        return $this->get('shop_id');
    }

    public function setShopId($shop_id)
    {
        $this->set('shop_id', $shop_id);
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

    public function getFulfillmentId()
    {
        return $this->get('fulfillment_id');
    }

    public function setFulfillmentId($fulfillment_id)
    {
        $this->set('fulfillment_id', $fulfillment_id);
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

    public function getHappenedAt()
    {
        return $this->get('happened_at');
    }

    public function setHappenedAt($happened_at)
    {
        $this->set('happened_at', $happened_at);
        return $this;
    }

    public function getMessage()
    {
        return $this->get('message');
    }

    public function setMessage($message)
    {
        $this->set('message', $message);
        return $this;
    }

    public function getCity()
    {
        return $this->get('city');
    }

    public function setCity($city)
    {
        $this->set('city', $city);
        return $this;
    }

    public function getProvince()
    {
        return $this->get('province');
    }

    public function setProvince($province)
    {
        $this->set('province', $province);
        return $this;
    }

    public function getZip()
    {
        return $this->get('zip');
    }

    public function setZip($zip)
    {
        $this->set('zip', $zip);
        return $this;
    }

    public function getCountry()
    {
        return $this->get('country');
    }

    public function setCountry($country)
    {
        $this->set('country', $country);
        return $this;
    }

    public function getAddress1()
    {
        return $this->get('address1');
    }

    public function setAddress1($address1)
    {
        $this->set('address1', $address1);
        return $this;
    }

    public function getLatitude()
    {
        return $this->get('latitude');
    }

    public function setLatitude($latitude)
    {
        $this->set('latitude', $latitude);
        return $this;
    }

    public function getLongitude()
    {
        return $this->get('longitude');
    }

    public function setLongitude($longitude)
    {
        $this->set('longitude', $longitude);
        return $this;
    }
}
