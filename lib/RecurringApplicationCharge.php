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
    protected static $classHandle = 'recurring_application_charge';
    protected static $classUrl = 'recurring_application_charges';

    public function activate()
    {
        $resp = self::call(self::$classUrl.'/'.$this->id.'/activate', 'POST', array('recurring_application_charge' => $this));
        $this->refresh($resp->{static::$classHandle});
        return TRUE;
    }
}
