<?php
/**
 * \Shopify\ScriptTag
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/scripttag
 */
namespace Shopify;

use Shopify\Util;

class ScriptTag extends AbstractObject
{
    protected static $handle = 'script_tag';
    protected static $classUrl = 'script_tags';
}
