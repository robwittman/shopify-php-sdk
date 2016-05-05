<?php
/**
 * \Shopify\Page
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/page
 */
namespace Shopify;

use Shopify\Util;

class Page extends AbstractObject
{
    protected static $handle = 'page';
    protected static $classUrl = 'pages';
}
