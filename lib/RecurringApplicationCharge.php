<?php
/**
 * \Shopify\RecurringApplicationCharge
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/recurringapplicationcharge
 */
namespace Shopify;

use Shopify\Util;

class RecurringApplicationCharge extends AbstractObject
{
    protected static $handle = 'recurring_application_charge';
    protected static $classUrl = 'recurring_application_charges';
}
