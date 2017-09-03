<?php

namespace Shopify\Enum\Fields;

class MetafieldFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const DESCIRPTION = 'description';
    const ID = 'id';
    const KEY = 'key';
    const NAMESPACE = 'namespace';
    const OWNER_ID = 'owner_id';
    const OWNER_RESOURCE = 'owner_resource';
    const VALUE = 'value';
    const VALUE_TYPE = 'value_type';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'created_at' => 'DateTime',
            'description' => 'string',
            'id' => 'integer',
            'key' => 'string',
            'namespace' => 'string',
            'owner_id' => 'integer',
            'owner_resource' => 'string',
            'value' => 'string',
            'value_type' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
