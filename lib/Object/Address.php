<?php
/**
 *
 * Shopify\Object\Address
 *
 * Represents an Address object
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
 */

namespace Shopify\Object;

class Address extends AbstractObject
{
    /**
     * The street address of the billing address.
     * @var string
     */
    protected $address1;

    /**
     * An optional additional field for the street address of the billing address.
     * @var string
     */
    protected $address2;

    /**
     * The city of the billing address
     * @var string
     */
    protected $city;

    /**
     * The company of the person associated with the billing address
     * @var string
     */
    protected $company;

    /**
     * The name of the country of the billing address.
     * @var string
     */
    protected $country;

    /**
     * The two-letter code (ISO 3166-1 alpha-2 two-letter country code) for the country of the billing address.
     * @var string
     */
    protected $country_code;

    /**
     * The first name of the person associated with the payment method.
     * @var string
     */
    protected $first_name;

    /**
     * The last name of the person associated with the payment method.
     * @var string
     */
    protected $last_name;

    /**
     * The latitude of the billing address.
     * @var float
     */
    protected $latitude;

    /**
     * The longitude of the billing address.
     * @var float
     */
    protected $longitude;

    /**
     * The full name of the person associated with the payment method.
     * @var string
     */
    protected $name;

    /**
     * The phone number at the billing address.
     * @var string
     */
    protected $phone;

    /**
     * The name of the state or province of the billing address.
     * @var string
     */
    protected $province;

    /**
     * The two-letter abbreviation of the state or province of the billing address.
     * @var string
     */
    protected $province_code;

    /**
     * The zip or postal code of the billing address.
     * @var string
     */
    protected $zip;

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

    public function getCity()
    {
        return $this->get('city');
    }

    public function setCity($city)
    {
        $this->set('city', $city);
        return $this;
    }

    public function getCompany()
    {
        return $this->get('company');
    }

    public function setCompany($company)
    {
        $this->set('company', $company);
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

    public function getCountryCode()
    {
        return $this->get('country_code');
    }

    public function setCountryCode($country_code)
    {
        $this->set('country_code', $country_code);
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

    public function getLastName()
    {
        return $this->get('last_name');
    }

    public function setLastName($last_name)
    {
        $this->set('last_name', $last_name);
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

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
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

    public function getProvince()
    {
        return $this->get('province]');
    }

    public function setProvince($province])
    {
        $this->set('province]', $province]);
        return $this;
    }

    public function getProvinceCode()
    {
        return $this->get('province_code');
    }

    public function setProvinceCode($province_code)
    {
        $this->set('province_code', $province_code);
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
}
