<?php

namespace Shopify\Enum\Fields;

class ScriptTagFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const EVENT = 'event';
    const ID = 'id';
    const SRC = 'src';
    const DISPLAY_SCOPE = 'display_scope';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'created_at' => 'DateTime',
            'event' => 'string',
            'id' => 'integer',
            'src' => 'string',
            'display_scope' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
