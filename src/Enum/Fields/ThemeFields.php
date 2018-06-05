<?php

namespace Shopify\Enum\Fields;

class ThemeFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const NAME = 'name';
    const ROLE = 'role';
    const UPDATED_AT = 'updated_at';
    const PREVIEWABLE = 'previewable';
    const PROCESSING = 'processing';

    public function getFieldTypes()
    {
        return array(
            'created_at' => 'DateTime',
            'id' => 'integer',
            'name' => 'string',
            'role' => 'string',
            'updated_at' => 'DateTime',
            'previewable' => 'boolean',
            'processing' => 'boolean'
        );
    }
}
