<?php

namespace Shopify\Enum\Fields;

class CommentFields extends AbstractObjectEnum
{
    const ARTICLE_ID = 'article_id';
    const AUTHOR = 'author';
    const BLOG_ID = 'blog_id';
    const BODY = 'body';
    const BODY_HTML = 'body_html';
    const CREATED_AT = 'created_at';
    const EMAIL = 'email';
    const ID = 'id';
    const IP = 'ip';
    const PUBLISHED_AT = 'published_at';
    const STATUS = 'status';
    const UPDATED_AT = 'updated_at';
    const USER_AGENT = 'user_agent';

    public function getFieldTypes()
    {
        return array(
            'article_id' => 'integer',
            'author' => 'string',
            'blog_id' => 'integer',
            'body_html' => 'string',
            'created_at' => 'DateTime',
            'email' => 'string',
            'id' => 'integer',
            'ip' => 'string',
            'published_at' => 'DateTime',
            'status' => 'string',
            'updated_at' => 'DateTime',
            'user_agent' => 'object'
        );
    }
}
