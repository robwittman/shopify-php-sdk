<?php
/**
 * \Shopify\ProductImage
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/product_image
 */
namespace Shopify;

class ProductImage extends AbstractChildObject
{
    protected static $parentUrl = 'products';
    protected static $parentIdField = 'product_id';
    protected static $classUrl = 'images';
    protected static $classHandle = 'image';
}
