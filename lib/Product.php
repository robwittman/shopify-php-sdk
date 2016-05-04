<?php

namespace Shopify;

use Shopify\Util;

class Product extends AbstractObject
{
    protected static $classUrl = 'products';
    protected static $handle = 'product';

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
