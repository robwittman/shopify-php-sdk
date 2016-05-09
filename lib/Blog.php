<?php
/**
 * \Shopify\Blog
 *
 * @author Robert Wittman <bugattiboi1k1@gmail.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/blog
 */
namespace Shopify;

class Blog extends AbstractObject
{
    protected static $classHandle = 'blog';
    protected static $classUrl = 'blogs';

    public function getArticles($params = array())
    {
        $this->assureId();
        $data = self::call(static::$classUrl.'/'.$this->id.'/articles', 'GET', $params);
        return Util\ObjectSet::createObjectFromJson($data);
    }
}
