<?php

namespace Shopify\Enum\Fields;

class CustomCollectionFields extends AbstractObjectEnum
{
    const BODY_HTML = 'body_html';
    const HANDLE = 'handle';
    const IMAGE = 'image';
    const ID = 'id';
    const METAFIELD = 'metafield';
    const PUBLISHED = 'published';
    const PUBLISHED_AT = 'published_at';
    const PUBLISHED_SCOPE = 'published_scope';
    const SORT_ORDER = 'sort_order';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const TITLE = 'title';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'body_html' => 'string',
            'handle' => 'string',
            'image' => 'object',
            'id' => 'integer',
            'metafield' => 'Metafield[]',
            'published' => "boolean",
            'published_at' => 'DateTime',
            'published_scope' => 'string',
            'sort_order' => 'string',
            'template_suffix' => 'string',
            'title' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
