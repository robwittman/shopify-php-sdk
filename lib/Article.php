<?php
/**
 * \Shopify\Article
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/article
 */
namespace Shopify;

use Shopify\Util;

class Article extends AbstractChildObject
{
    protected static $parentUrl = 'blogs';
    protected static $parentIdField = 'blog_id';
    protected static $classUrl = 'articles';
    protected static $handle = 'article';
}
