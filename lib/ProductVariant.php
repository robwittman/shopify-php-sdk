<?php
/**
 * \Shopify\ProductVariant
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/product_variant
 */
namespace Shopify;

class ProductVariant extends AbstractChildObject
{
    protected static $parentUrl = 'products';
    protected static $parentIdField = 'product_id';
    protected static $classUrl = 'variants';
    protected static $classHandle = 'variant';

    /**
     * Overidden update function.
     *
     * API updating of variants does not require the product ID
     */
    public function update()
    {
        if(!isset($this->id))
        {
            throw new Exception("An object must exist in order to update it");
        }
        $resp = self::call(static::$classUrl.'/'.$this->id, 'PUT', array(static::$classHandle => $this));
        $this->refresh($resp->{static::$classHandle});
        return $resp;
    }
}
