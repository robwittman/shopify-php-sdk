<?php
/**
 * \Shopify\ApplicationCharge
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/applicationcharge
 */
namespace Shopify;

use Shopify\Util;

class ApplicationCharge extends AbstractObject
{
    /**
     * Resource endpoint
     * @var string
     */
    protected static $classUrl = 'application_charges';

    /**
     * Resource handle
     * @var string
     */
    protected static $classHandle = 'application_charge';

    public function activate()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/activate' , 'POST', array('application_charge' => $this));
        $this->refresh($resp->{static::$classHandle});
        return TRUE;
    }

    public function update()
    {
        throw new Exception\ApiException("Application Charges cannot be updated. You have to create a new one instead");
    }

    public function delete()
    {
        throw new Exception\ApiException("Application Charges cannot be deleted through the API");
    }
}
