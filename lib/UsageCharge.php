<?php
/**
 * \Shopify\UsageCharge
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/usagecharge
 */
namespace Shopify;

class UsageCharge extends AbstractChildObject
{
    protected static $parentUrl = 'recurring_application_charges';
    protected static $parentIdField = 'recurring_application_charge_id';
    protected static $classUrl = 'refunds';
    protected static $handle = 'refund';
}
