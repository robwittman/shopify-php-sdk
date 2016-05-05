<?php
/**
 * \Shopify\Redirect
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/redirect
 */
namespace Shopify;

use Shopify\Util;

class Redirect extends AbstractObject
{
    protected static $handle = 'redirect';
    protected static $classUrl = 'redirects';
}
