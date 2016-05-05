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
    protected static $handle = 'application_charge';
}
