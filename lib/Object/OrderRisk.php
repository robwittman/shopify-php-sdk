<?php
/**
 *
 * Shopify\Object\OrderRisk
 *
 * The Order risk assessment is used to indicate to a merchant the fraud checks that have been done on an order.
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
 * @link https://help.shopify.com/api/reference/order_risks
 */

namespace Shopify\Object;

class OrderRisk extends AbstractObject
{
    /**
     * Use this flag when a fraud check is accompanied with a call to the Orders
     * API to cancel the order. This will indicate to the merchant that this risk
     * was severe enough to force cancellation of the order.
     * @var boolean
     */
    protected $cause_cancel;

    /**
     * States whether or not the risk is displayed. Valid values are "true" or "false".
     * @var boolean
     */
    protected $display;

    /**
     * The id of the order the order risk belongs to
     * @var integer
     */
    protected $order_id;

    /**
     * A message that should be displayed to the merchant to indicate the results of the fraud check.
     * @var string
     */
    protected $message;

    /**
     * The recommended action given to the merchant.
     * @var string
     */
    protected $recommendation;

    /**
     * A number between 0 and 1 indicating percentage likelihood of being fraud.
     * @var float
     */
    protected $score;

    /**
     * This indicates the source of the risk assessment.
     * @var string
     */
    protected $source;

    public function getCauseCancel()
    {
        return $this->get('cause_cancel');
    }

    public function setCauseCancel($cause_cancel)
    {
        $this->set('cause_cancel', $cause_cancel);
        return $this;
    }

    public function getDisplay()
    {
        return $this->get('display');
    }

    public function setDisplay($display)
    {
        $this->set('display', $display);
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

    public function getMessage()
    {
        return $this->get('message');
    }

    public function setMessage($message)
    {
        $this->set('message', $message);
        return $this;
    }

    public function getRecommendation()
    {
        return $this->get('recommendation');
    }

    public function setRecommendation($recommendation)
    {
        $this->set('recommendation', $recommendation);
        return $this;
    }

    public function getScore()
    {
        return $this->get('score');
    }

    public function setScore($score)
    {
        $this->set('score', $score);
        return $this;
    }

    public function getSource()
    {
        return $this->get('source');
    }

    public function setSource($source)
    {
        $this->set('source', $source);
        return $this;
    }
}
