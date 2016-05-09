<?php
/**
 * \Shopify\GiftCard
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/giftcard
 */
namespace Shopify;

use Shopify\Util;

class GiftCard extends AbstractObject
{
    protected static $classHandle = 'gift_card';
    protected static $classUrl = 'gift_cards';

    public function disable()
    {
        $resp = self::call(static::$classUrl.'/'.$this->id.'/disable' , 'POST', array('gift_card' => $this));
        $this->refresh($resp->{self::$classHandle});
        return TRUE;
    }
}
