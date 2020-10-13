<?php

namespace Shopify\Enum\Fields;

class CollectionListingFields extends AbstractObjectEnum
{
    const COLLECTION_ID = 'collection_id';
    const BODY_HTML = 'body_html';
    const DEFAULT_PRODUCT_IMAGE = 'default_product_image';
    const IMAGE = 'image';
    const HANDLE = 'handle';
    const PUBLISHED_AT = 'published_at';
    const TITLE = 'title';
    const SORT_ORDER = 'sort_order';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'collection_id' => 'integer',
            'body_html' => 'string',
            'default_product_image' => 'object',
            'image' => 'object',
            'handle' => 'string',
            'published_at' => 'DateTime',
            'title' => 'string',
            'sort_order' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
