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
    protected static $classHandle = 'article';

    public static function getAuthors()
    {
        $resp = self::call(static::$classUrl.'/authors' , 'GET');
        return $resp->authors;
    }

    public static function getTags()
    {
        $resp = self::call(static::$classUrl.'/tags', 'GET');
        return $resp->tags;
    }

    public static function getTagsFromBlog($parentId)
    {
        $resp = self::call(static::$parentUrl.'/'.$parentId.'/'.static::$classUrl.'/tags', 'GET');
        return $resp->tags;
    }
}
