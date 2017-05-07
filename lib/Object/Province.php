<?php
/**
 *
 * Shopify\Object\Province
 *
 * Shop owners can specify which country or countries they will ship to and these
 * countries are made available through the API using the country resource. Shop
 * owners can do this by navigating to the "Preferences" tab under "Regions & Taxes."
 * If any of those countries have states or provinces, those states or provinces
 * are also registered as shipping destinations, each of which can have its own
 * state or provincial sales tax.
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
 * @link https://help.shopify.com/api/reference/province
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Province extends AbstractObject
{
    public static function getApiHandle()
    {
        return 'provinces';
    }

    /**
     * The standard abbreviation for the state or province.
     * @var string
     */
    protected $code;

    /**
     * The unique numeric identifier for the country.
     * @var integer
     */
    protected $country_id;

    /**
     * The full name of the state or province.
     * @var string
     */
    protected $name;

    /**
     * The unique numeric identifier for the shipping zone the province belongs to.
     * @var integer
     */
    protected $shipping_zone_id;

    /**
     * The national sales tax rate to be applied to orders made by customers from that province or state.
     * @var float
     */
    protected $tax;

    /**
     * The name of the tax for that province or state.
     * @var string
     */
    protected $tax_name;

    /**
     * Compounded sales tax. For example, the Canadian HST (also known as, the
     * "Harmonized Sales tax") is a compounded sales tax of both PST and GST.
     * @var string
     */
    protected $tax_type;

    /**
     * The province or state's tax in percent format.
     * @var float
     */
    protected $tax_percentage;

    public function getCode()
    {
        return $this->get('code');
    }

    public function setCode($code)
    {
        $this->set('code', $code);
        return $this;
    }

    public function getCountryId()
    {
        return $this->get('country_id');
    }

    public function setCountryId($country_id)
    {
        $this->set('country_id', $country_id);
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

    public function getShippingZoneId()
    {
        return $this->get('shipping_zone_id');
    }

    public function setShippingZoneId($shipping_zone_id)
    {
        $this->set('shipping_zone_id', $shipping_zone_id);
        return $this;
    }

    public function getTax()
    {
        return $this->get('tax');
    }

    public function setTax($tax)
    {
        $this->set('tax', $tax);
        return $this;
    }

    public function getTaxName()
    {
        return $this->get('tax_name');
    }

    public function setTaxName($tax_name)
    {
        $this->set('tax_name', $tax_name);
        return $this;
    }

    public function getTaxType()
    {
        return $this->get('tax_type');
    }

    public function setTaxType($tax_type)
    {
        $this->set('tax_type', $tax_type);
        return $this;
    }

    public function getTaxPercentage()
    {
        return $this->get('tax_percentage');
    }

    public function setTaxPercentage($tax_percentage)
    {
        $this->set('tax_percentage', $tax_percentage);
        return $this;
    }
}
