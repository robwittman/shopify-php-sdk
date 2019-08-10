<?php

namespace Shopify\Enum\Fields;

class PageFields extends AbstractObjectEnum
{
    const AUTHOR = 'author';
    const BODY_HTML = 'body_html';
    const CREATED_AT = 'created_at';
    const HANDLE = 'handle';
    const ID = 'id';
    const METAFIELD = 'metafield';
    const PUBLISHED_AT = 'published_at';
    const SHOP_ID = 'shop_id';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const TITLE = 'title';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'author' => 'string',
            'body_html' => 'string',
            'created_at' => 'DateTime',
            'handle' => 'string',
            'id' => 'integer',
            'metafield' => 'array',
            'published_at' => 'DateTime',
            'shop_id' => 'integer',
            'template_suffix' => 'string',
            'title' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
