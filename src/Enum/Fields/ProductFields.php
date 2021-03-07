<?php

namespace Shopify\Enum\Fields;

class ProductFields extends AbstractObjectEnum
{
    const BODY_HTML = 'body_html';
    const CREATED_AT = 'created_at';
    const HANDLE = 'handle';
    const ID = 'id';
    const IMAGES = 'images';
    const OPTIONS = 'options';
    const PRODUCT_TYPE = 'product_type';
    const PUBLISHED_AT = 'published_at';
    const PUBLISHED_SCOPE = 'published_scope';
    const STATUS = 'status';
    const TAGS = 'tags';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const TITLE = 'title';
    const METAFIELDS_GLOBAL_TITLE_TAG = 'metafields_global_title_tag';
    const METAFIELDS_GLOBAL_DESCRIPTION_TAG = 'metafields_global_description_tag';
    const UPDATED_AT = 'updated_at';
    const VARIANTS = 'variants';
    const VENDOR = 'vendor';
    const IMAGE = 'image';

    public function getFieldTypes()
    {
        return array(
            'body_html' => 'string',
            'created_at' => 'DateTime',
            'handle' => 'string',
            'id' => 'integer',
            'images' => 'ProductImage[]',
            'options' => 'ProductOption[]',
            'product_type' => 'string',
            'published_at' => 'DateTime',
            'published_scope' => 'string',
            'status' => 'string',
            'tags' => 'string',
            'template_suffix' => 'string',
            'title' => 'string',
            'metafields_global_title_tag' => 'string',
            'metafields_global_description_tag' => 'string',
            'updated_at' => 'DateTime',
            'variants' => 'ProductVariant[]',
            'vendor' => 'string',
            'image' => 'ProductImage'
        );
    }
}
