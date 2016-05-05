<?php
/**
 * \Shopify\Asset
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/asset
 */
namespace Shopify;

class Asset extends AbstractChildObject
{
    protected static $parentIdField = 'theme_id';
    protected static $parentUrl = 'themes';
    protected static $handle = 'asset';
    protected static $classUrl = 'assets';
}
