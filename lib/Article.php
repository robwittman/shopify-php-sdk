<?php

namespace Shopify;

use Shopify\Util;

class Article extends AbstractChildObject
{
    protected static $parentUrl = 'blogs';
    protected static $parentIdField = 'blog_id';
    protected static $classUrl = 'articles';
    protected static $handle = 'article';
}
