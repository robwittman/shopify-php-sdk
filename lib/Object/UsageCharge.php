<?php
/**
 *
 * Shopify\Object\UsageCharge
 *
 * Usage charges are part of Shopify's application billing API. The usage_charge
 * endpoint allows your apps to charge a variable monthly fee for an app or a service.
 * You should use this API to charge merchants for your product when the fees are
 * recurring, but vary from month to month.
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
 * @link https://help.shopify.com/api/reference/usagecharge
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class UsageCharge extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The name of the usage charge.
     * @var string
     */
    protected $description;

    /**
     * The price of the usage charge.
     * @var integer
     */
    protected $price;

    /**
     * The recurring application charge the usage charge belongs to.
     * @var integer
     */
    protected $recurring_appliction_charge_id;

    public function getDescription()
    {
        return $this->get('description');
    }

    public function setDescription($description)
    {
        $this->set('description', $description);
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

    public function getRecurringApplicationChargeId()
    {
        return $this->get('recurring_appliction_charge_id');
    }

    public function setRecurringApplicationChargeId($recurring_appliction_charge_id)
    {
        $this->set('recurring_appliction_charge_id', $recurring_appliction_charge_id);
        return $this;
    }
}
