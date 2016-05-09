<?php
/**
 * \Shopify\FulfillmentEvent
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/fulfillmentevent
 */
namespace Shopify;

class FulfillmentEvent extends AbstractChildObject
{
    protected static $classUrl = 'events';
    protected static $classHandle = 'fulfillment_event';
    protected static $orderIdField = 'order_id';
    protected static $orderHandle = 'orders';
    protected static $fulfillmentIdField = 'fulfillment_id';
    protected static $fulfillmentUrl = 'fulfillments';

    public function __construct($data = array())
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }

    public static function get($order_id, $fulfillment_id, $event_id)
    {
        $path = static::$orderHandle.'/'.$order_id.'/'.static::$fulfillmentUrl.'/'.$fulfillment_id.'/'.static::$classUrl.'/'.$event_id;
        $resp = self::call($path, 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public static function all($order_id, $fulfillment_id)
    {
        $path = static::$orderHandle.'/'.$order_id.'/'.static::$fulfillmentUrl.'/'.$fulfillment_id.'/'.static::$classUrl;
        $resp = self::call($path, 'GET');
        return Util\ObjectSet::createObjectFromJson($resp);
    }

    public function create()
    {
        $this->assureOrderId();
        $this->assureFulfillmentId();
        $path = static::$orderHandle.'/'.$this->{static::$orderIdField}.'/'.static::$fulfillmentUrl.'/'.$this->{static::$fulfillmentIdField}.'/'.static::$classUrl;
        $resp = self::call($path, 'POST', array('fulfillment_event' => $this));
        $this->refresh($resp->{static::$classHandle});
    }

    public function update()
    {
        throw new Exception\ApiException("This API SDK cannot be used to update the 'fulfillment_event' resource");
    }

    public function delete()
    {
        $this->assureOrderId();
        $this->assureFulfillmentId();
        $path = static::$orderHandle.'/'.$this->{static::$orderIdField}.'/'.static::$fulfillmentUrl.'/'.$this->{static::$fulfillmentIdField}.'/'.static::$classUrl.'/'.$this->id;
        self::call($path, 'DELETE');
        return NULL;
    }

    public function assureOrderId()
    {
        if(!isset($this->{static::$orderIdField}) || is_null($this->{static::$orderIdField}))
        {
            throw new Exception\ApiException("Managing the 'fulfillment_event' resource requires both an order_id and fulfillment_id");
        }
        return TRUE;
    }

    public function assureFulfillmentId()
    {
        if(!isset($this->{static::$fulfillmentIdField}) || is_null($this->{static::$fulfillmentIdField}))
        {
            throw new Exception\ApiException("Managing the 'fulfillment_event' resource requires both an order_id and fulfillment_id");
        }
        return TRUE;
    }
}
