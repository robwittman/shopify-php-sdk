<?php

namespace Shopify\Enum\Fields;

class CollectFields extends AbstractObjectEnum
{
    const COLLECTION_ID = 'collection_id';
    const CREATED_AT = 'created_at';
    const FEATURED = 'featured';
    const ID = 'id';
    const POSITION = 'position';
    const PRODUCT_ID = 'product_id';
    const SORT_VALUE = 'sort_value';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'collection_id' => 'integer',
            'created_at' => 'DateTime',
            'featured' => 'boolean',
            'id' => 'integer',
            'position' => 'integer',
            'product_id' => 'integer',
            'sort_value' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
