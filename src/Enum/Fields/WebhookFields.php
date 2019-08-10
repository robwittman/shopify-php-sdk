<?php

namespace Shopify\Enum\Fields;

class WebhookFields extends AbstractObjectEnum
{
    const ADDRESS = 'address';
    const CREATED_AT = 'created_at';
    const FIELDS = 'fields';
    const FORMAT = 'format';
    const ID = 'id';
    const METAFIELD_NAMESPACES = 'metafield_namespaces';
    const TOPIC = 'topic';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'address' => 'string',
            'created_at' => 'DateTime',
            'fields' => 'array',
            'format' => 'string',
            'id' => 'integer',
            'metafield_namespaces' => 'array',
            'topic' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
