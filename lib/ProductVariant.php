<?php

namespace Shopify;

class ProductVariant extends AbstractChildObject
{
    protected static $parentUrl = 'products';
    protected static $parentIdField = 'product_id';
    protected static $classUrl = 'variants';
    protected static $handle = 'variant';
}
