<?php
/**
 *
 * Shopify\Object\Location
 *
 * A Location represents a geographical location where your stores, headquarters,
 * and/or pop-up stores exist. These locations can be used to track sales and to
 * help Shopify configure the tax rates to charge when selling products.
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
 * @link https://help.shopify.com/api/reference/location
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Location extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The name of the location
     * @var string
     */
    protected $name;

    /**
     * The first line of the address
     * @var string
     */
    protected $address1;

    /**
     * The second line of the address
     * @var string
     */
    protected $address2;

    /**
     * The zip or postal code
     * @var string
     */
    protected $zip;

    /**
     * The city the location is in
     * @var string
     */
    protected $city;

    /**
     * The province the location is in
     * @var string
     */
    protected $province;

    /**
     * The country the location is in
     * @var string
     */
    protected $country;

    /**
     * The phone number of the location, can contain special chars like - and +
     * @var string
     */
    protected $phone;

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
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

    public function getAddress2()
    {
        return $this->get('address2');
    }

    public function setAddress2($address2)
    {
        $this->set('address2', $address2);
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

    public function getCountry()
    {
        return $this->get('country');
    }

    public function setCountry($country)
    {
        $this->set('country', $country);
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
}
