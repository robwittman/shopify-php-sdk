<?php
/**
 * \Shopify\Customer
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/customer
 */
namespace Shopify;

use Shopify\Util;

class Customer extends AbstractObject
{
    protected static $classHandle = 'customer';
    protected static $classUrl = 'customers';

    public function createAccountActivationURL()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/account_activation_url' , 'POST', array('customer' => $this));
        return $resp->account_activation_url;
    }

    public function getOrders()
    {
        $orders = self::call('orders', 'GET', ['customer_id' => $this->id]);
        return Util\ObjectSet::createObjectFromJson($orders);
    }

    public function getAddresses()
    {
        $addresses = self::call(static::$classUrl.'/'.$this->id.'/addresses', 'GET');
        return Util\ObjectSet::createObjectFromJson($addresses);
    }

    public function setAddressAsDefault($address_id)
    {
        $resp = self::call(static::$classUrl.'/',$this->id.'/addresses/'.$address_id.'/default', 'POST');
        return TRUE;
    }
}
