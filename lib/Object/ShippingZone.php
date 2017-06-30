<?php
/**
 *
 * Shopify\Object\ShippingZone
 *
 * This is used to view shipping zones, their countries, provinces, and shipping rates.
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
 * @link https://help.shopify.com/api/reference/shipping_zone
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;
use Shopify\Object\Country;
use Shopify\Object\Province;

class ShippingZone extends AbstractObject
{
    use HasTimestamps;

    public static function getApiHandle()
    {
        return 'shipping_zones';
    }
    
    /**
     * The name of the shipping zone, specified by the user.
     * @var string
     */
    protected $name;

    /**
     * A list of countries that belong to the shipping zone.
     * @var Country[]
     */
    protected $countries;

    /**
     * The sub-regions of a country.
     * @var Province[]
     */
    protected $provinces;

    /**
     * Information about carrier shipping providers and the rates used.
     * @var array
     */
    protected $carrier_shipping_rate_providers;

    /**
     * Information about price based shipping rates used.
     * @var array
     */
    protected $price_based_shipping_rates;

    /**
     * Information about weight based shipping rates used.
     * @var array
     */
    protected $weight_based_shipping_rates;

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
        return $this;
    }

    public function getCountries()
    {
        return $this->get('countries');
    }

    public function setCountries($countries)
    {
        $this->set('countries', $countries);
        return $this;
    }

    public function getProvinces()
    {
        return $this->get('provinces');
    }

    public function setProvinces($provinces)
    {
        $this->set('provinces', $provinces);
        return $this;
    }

    public function getCarrierShippingRateProviders()
    {
        return $this->get('carrier_shipping_rate_providers');
    }

    public function setCarrierShippingRateProviders($carrier_shipping_rate_providers)
    {
        $this->set('carrier_shipping_rate_providers', $carrier_shipping_rate_providers);
        return $this;
    }

    public function getPriceBasedShippingRates()
    {
        return $this->get('price_based_shipping_rates');
    }

    public function setPriceBasedShippingRates($price_based_shipping_rates)
    {
        $this->set('price_based_shipping_rates', $price_based_shipping_rates);
        return $this;
    }

    public function getWeightBasedShippingRates()
    {
        return $this->get('weight_based_shipping_rates');
    }

    public function setWeightBasedShippingRates($weight_based_shipping_rates)
    {
        $this->set('weight_based_shipping_rates', $weight_based_shipping_rates);
        return $this;
    }
}
