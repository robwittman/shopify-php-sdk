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
    protected static $handle = 'variant';
}
