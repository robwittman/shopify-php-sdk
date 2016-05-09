<?php
/**
 * \Shopify\OrderRisks
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/order_risks
 */

namespace Shopify;

class OrderRisks extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'risks';
    protected static $classHandle = 'risk';

    /**
     * We override the get function to add the order_id to the object
     * @param  integer $id
     * @param  integer $parentId
     * @return OrderRisks
     */
    public static function get($id, $parentId)
    {
        $resp = self::call(static::parentUrl().'/'.$parentId.'/'.static::$classUrl.'/'.$id, 'GET');
        $obj = Util\ObjectSet::createObjectFromJson($resp);
        $obj->order_id = $parentId;
        return $obj;
    }
}
