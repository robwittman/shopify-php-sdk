<?php
/**
 *
 * Shopify\Object\Country
 *
 * Shop owners can specify the country or countries they will ship their products
 * to. Shop owners are able to do this through their shop admin dashboard in the
 * "Settings" tab, under the "Taxes" tab.
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
 * @link https://help.shopify.com/api/reference/country
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Country extends AbstractObject
{
    use HasId;

    public static function getApiHandle()
    {
        return 'countries';
    }
    
    /**
     * The ISO 3166-1 alpha-2 two-letter country code for the country.
     * The code for a given country will be the same as the code for the same country in another shop.
     * @var string
     */
    protected $code;

    /**
     * The full name of the country, in English.
     * @var string
     */
    protected $name;

    /**
     * The sub-regions of a country.
     * @var string
     */
    protected $provinces;

    /**
     * The national sales tax rate to be applied to orders made by customers from that country.
     * @var float
     */
    protected $tax;

    public function getCode()
    {
        return $this->get('code');
    }

    public function setCode($code)
    {
        $this->set('code', $code);
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

    public function getProvinces()
    {
        return $this->get('provinces');
    }

    /**
     * @param Province[] $provinces
     */
    public function setProvinces($provinces)
    {
        $this->set('provinces', $provinces);
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
}
