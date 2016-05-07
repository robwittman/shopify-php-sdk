<?php
/**
 * \Shopify\Transaction
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/transaction
 */
namespace Shopify;

class Transaction extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'transactions';
    protected static $handle = 'transaction';
}
