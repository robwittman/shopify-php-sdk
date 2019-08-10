<?php

namespace Shopify\Enum\Fields;

class BlogFields extends AbstractObjectEnum
{
    const COMMENTABLE = 'commentable';
    const CREATED_AT = 'created_at';
    const FEEDBURNER = 'feedburner';
    const HANDLE = 'handle';
    const ID = 'id';
    const METAFIELD = 'metafield';
    const TAGS = 'tags';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const TITLE = 'title';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'commentable' => 'boolean',
            'created_at' => 'DateTime',
            'feedburner' => 'string',
            'handle' => 'string',
            'id' => 'integer',
            'metafield' => 'Metafield[]',
            'tags' => 'string',
            'template_suffix' => 'string',
            'title' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
