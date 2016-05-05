<?php
/**
 * \Shopify\CustomCollection
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/customcollection
 */
namespace Shopify;

use Shopify\Util;

class CustomCollection extends AbstractObject
{
    protected static $handle = 'custom_collection';
    protected static $classUrl = 'custom_collections';
}
