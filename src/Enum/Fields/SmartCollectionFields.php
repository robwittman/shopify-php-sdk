<?php

namespace Shopify\Enum\Fields;

class SmartCollectionFields extends AbstractObjectEnum
{
    const BODY_HTML = 'body_html';
    const HANDLE = 'handle';
    const ID = 'id';
    const IMAGE = 'image';
    const PUBLISHED_AT = 'published_at';
    const PUBLISHED_SCOPE = 'published_scope';
    const RULES = 'rules';
    const DISJUNCTIVE = 'disjunctive';
    const SORT_ORDER = 'sort_order';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const TITLE = 'title';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'body_html' => 'string',
            'handle' => 'string',
            'id' => 'integer',
            'image' => 'object',
            'published_at' => 'DateTime',
            'published_scope' => 'string',
            'rules' => 'array',
            'disjunctive' => 'boolean',
            'sort_order' => 'string',
            'template_suffix' => 'string',
            'title' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
