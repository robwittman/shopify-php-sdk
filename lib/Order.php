<?php
/**
 * \Shopify\Order
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/order
 */
namespace Shopify;

use Shopify\Util;

class Order extends AbstractObject
{
    protected static $classHandle = 'order';
    protected static $classUrl = 'orders';

    public function __construct($data)
    {
        parent::__construct($data);
        $fulfillments = array();
        $transactions = array();
        if(isset($this->customer)) $this->customer = new \Shopify\Customer($this->customer);

        if(isset($data->fulfillments))
        {
            foreach($data->fulfillments as $fulfillment) array_push($fulfillments, new \Shopify\Fulfillment($fulfillment));
            $this->fulfillments = $fulfillments;
        }
        if(isset($data->transactions))
        {
            foreach($data->transactions as $transaction) array_push($transactions, new \Shopify\Transaction($transaction));
            $this->transactions = $transactions;
        }
    }

    public function close()
    {
        $resp = self::call(self::$classUrl.'/'.$this->id.'/close', 'POST', array('order' => $this));
        $this->refresh($resp->{static::$classHandle});
        return TRUE;
    }

    public function open()
    {
        $resp = self::call(self::$classUrl.'/'.$this->id.'/open', 'POST', array('order' => $this));
        $this->refresh($resp->{static::$classHandle});
        return TRUE;
    }

    public function cancel()
    {
        $resp = self::call(self::$classUrl.'/'.$this->id.'/cancel', 'POST', array('order' => $this));
        $this->refresh($resp->{static::$classHandle});
        return TRUE;
    }

    public function getFulfillments()
    {
        $fulfillments = self::call(self::$classUrl.'/'.$this->id.'/fulfillments', 'GET');
        return Util\ObjectSet::createObjectFromJson($fulfillments);
    }

    public function getTransactions()
    {
        $transactions = self::call(self::$classUrl.'/'.$this->id.'/transactions', 'GET');
        return Util\ObjectSet::createObjectFromJson($transactions);
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}
