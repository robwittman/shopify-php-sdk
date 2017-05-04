<?php
/**
 *
 * Shopify\Object\ApplicationCredit
 *
 * If a merchant requests a refund for an application charge, you can use ApplicationCredit
 * to credit their account for future application purchases. Request to create an application
 * charge credit for a particular amount along with a description explaining why the credit
 * is being issued. A corresponding deduction based on your revenue share will appear in your
 * partner account. For example, if you request to create a credit for $10.00, a deduction
 * of $8.00 will be applied.
 *
 * The total amount of all ApplicationCredit objects requested by an application must not exceed:
 *  - Total amount paid to the application by the shop owner in the last 30 days.
 *  - Total amount of pending receivables in the partner account associated with the application.
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
 * @link https://help.shopify.com/api/reference/applicationcredit
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class ApplicationCredit extends AbstractObject
{
    use HasId;

    /**
     * The description of the application credit.
     * @var string
     */
    protected $description;

    /**
     * The amount refunded by the application credit.
     * @var integer
     */
    protected $amount;

    /**
     * States whether or not the application credit is a test transaction.
     * Valid values are "true" or "null".
     * @var string
     */
    protected $test;

    public function getDescription()
    {
        return $this->get('description');
    }

    public function setDescription($description)
    {
        $this->set('description', $description);
        return $this;
    }

    public function getAmount()
    {
        return $this->get('amount');
    }

    public function setAmount($amount)
    {
        $this->set('amount', $amount);
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
}
