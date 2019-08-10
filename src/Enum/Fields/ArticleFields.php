<?php

namespace Shopify\Enum\Fields;

class ArticleFields extends AbstractObjectEnum
{
    const AUTHOR = 'author';
    const BLOG_ID = 'blog_id';
    const BODY_HTML = 'body_html';
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const HANDLE = 'handle';
    const IMAGE = 'image';
    const METAFIELDS = 'metafields';
    const PUBLISHED = 'published';
    const PUBLISHED_AT = 'published_at';
    const SUMMARY_HTML = 'summary_html';
    const TAGS = 'tags';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const TITLE = 'title';
    const UPDATED_AT = 'updated_at';
    const USER_ID = 'user_id';

    public function getFieldTypes()
    {
        return array(
            'author' => 'string',
            'blog_id' => 'integer',
            'body_html' => 'string',
            'created_at' => 'DateTime',
            'id' => 'integer',
            'handle' => 'string',
            'image' => "array",
            'metafields' => 'array',
            'published' => 'boolean',
            'published_at' => 'DateTime',
            'summary_html' => 'string',
            'tags' => 'string',
            'template_suffix' => 'string',
            'title' => 'string',
            'updated_at' => 'DateTime',
            'user_id' => 'integer'
        );
    }
}
