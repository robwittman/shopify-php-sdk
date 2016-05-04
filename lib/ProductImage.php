<?php

namespace Shopify;

class ProductImage extends AbstractChildObject
{
    protected static $parentUrl = 'products';
    protected static $parentIdField = 'product_id';
    protected static $classUrl = 'images';
    protected static $handle = 'image';
}
