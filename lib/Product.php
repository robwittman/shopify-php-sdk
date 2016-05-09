<?php
/**
 * \Shopify\Product
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/product
 */
namespace Shopify;

use Shopify\Util;

class Product extends AbstractObject
{
    protected static $classUrl = 'products';
    protected static $classHandle = 'product';

    public function __construct($data)
    {
        parent::__construct($data);
        $variants = array();
        $images = array();
        if(isset($data->variants))
        {
            foreach($data->variants as $variant) array_push($variants, new \Shopify\ProductVariant($variant));
            $this->variants = $variants;
        }
        if(isset($data->images))
        {
            foreach($data->images as $image) array_push($images, new \Shopify\ProductImage($image));
            $this->images = $images;
        }
    }
}
