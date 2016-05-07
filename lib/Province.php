<?php
/**
 * \Shopify\Province
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/province
 */
namespace Shopify;

class Province extends AbstractChildObject
{
    protected static $parentUrl = 'countries';
    protected static $parentIdField = 'country_id';
    protected static $classUrl = 'provinces';
    protected static $handle = 'province';
}
