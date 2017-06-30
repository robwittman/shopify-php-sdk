<?php
/**
 *
 * Shopify\Object\Refund
 *
 * A refund is a record of the money returned to the customer, and/or the return
 * of any items on an order which may or may not have been restocked.
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
 * @link https://help.shopify.com/api/reference/refund
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;
use Shopify\Model\Transaction;

class Refund extends AbstractObject
{
    use HasTimestamps,
        HasId;

    public static function getApiHandle()
    {
        return 'refunds';
    }

    /**
     * The date and time when the refund was imported, in ISO 8601 format. This
     * value can be set to dates in the past when importing from other systems.
     * If no value is provided, it will be auto-generated.
     * @var string
     */
    protected $processed_at;

    /**
     * The optional note attached to a refund.
     * @var string
     */
    protected $note;

    /**
     * Details about one returned/refunded item
     * @var object
     */
    protected $refund_line_items;

    /**
     * Whether or not the line items were added back to the store inventory.
     * @var boolean
     */
    protected $restock;

    /**
     * The list of transactions involved in the refund.
     * @var Transaction[]
     */
    protected $transactions;

    /**
     * The unique identifier of the user who performed the refund.
     * @var integer
     */
    protected $user_id;

    public function getProcessedAt()
    {
        return $this->get('processed_at');
    }

    public function setProcessedAt($processed_at)
    {
        $this->set('processed_at', $processed_at);
        return $this;
    }

    public function getNote()
    {
        return $this->get('note');
    }

    public function setNote($note)
    {
        $this->set('note', $note);
        return $this;
    }

    public function getRefundLineItems()
    {
        return $this->get('refund_line_items');
    }

    public function setRefundLineItems($refund_line_items)
    {
        $this->set('refund_line_items', $refund_line_items);
        return $this;
    }

    public function getRestock()
    {
        return $this->get('restock');
    }

    public function setRestock($restock)
    {
        $this->set('restock', $restock);
        return $this;
    }

    public function getTransactions()
    {
        return $this->get('transactions');
    }

    public function setTransactions($transactions)
    {
        $this->set('transactions', $transactions);
        return $this;
    }

    public function getUserId()
    {
        return $this->get('user_id');
    }

    public function setUserId($user_id)
    {
        $this->set('user_id', $user_id);
        return $this;
    }
}
