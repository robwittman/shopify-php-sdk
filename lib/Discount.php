<?php
/**
 * \Shopify\Discount
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/discount
 */
namespace Shopify;

use Shopify\Util;

class Discount extends AbstractObject
{
    protected static $classHandle = 'discount';
    protected static $classUrl = 'discounts';

    public function update()
    {
        throw new Exception\ApiException("API SDK cannot be used to update discounts");
    }

    public function enable()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/enable' , 'POST', array('discount' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }

    public function disable()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/disable' , 'POST', array('discount' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }
}
