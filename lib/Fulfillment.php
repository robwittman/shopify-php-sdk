<?php
/**
 * \Shopify\Fulfillment
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/fulfillment
 */
namespace Shopify;

use Shopify\Fields\FulfillmentStatuses;

class Fulfillment extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'fulfillments';
    protected static $classHandle = 'fulfillment';

    public function complete()
    {
        $resp = self::call(self::$parentUrl.'/'.$this->order_id.'/'.self::$classUrl.'/'.$this->id.'/complete' , 'POST', array('fulfillment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function open()
    {
        $resp = self::call(self::$parentUrl.'/'.$this->order_id.'/'.self::$classUrl.'/'.$this->id.'/open', 'POST', array('fulfillment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function cancel()
    {
        $resp = self::call(self::$parentUrl.'/'.$this->order_id.'/'.self::$classUrl.'/'.$this->id.'/cancel', 'POST', array('fulfillment' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }
}
