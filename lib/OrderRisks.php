<?php/**
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
    protected static $handle = 'risk';
}
