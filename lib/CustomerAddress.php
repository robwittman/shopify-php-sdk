<?php
/**
 * \Shopify\CustomerAddress
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/customeraddress
 */
namespace Shopify;

class CustomerAddress extends AbstractChildObject
{
    protected static $parentUrl = 'customers';
    protected static $parentIdField = 'customer_id';
    protected static $classUrl = 'addresses';
    protected static $classHandle = 'customer_address';

    public function __construct($data)
    {
        parent::__construct($data);
    }
    public static function get($id, $parentId)
    {
        $obj = parent::get($id, $parentId);
        $obj->{static::$parentIdField} = $parentId;
        return $obj;
    }

    public function setAsDefault()
    {
        $resp = self::call(static::$parentUrl.'/'.$this->customer_id.'/'.static::$classUrl.'/'.$this->id.'/default', 'POST', array('customer_address' => $this));
        $this->refresh($resp->{static::$classHandle});
        return TRUE;
    }
}
