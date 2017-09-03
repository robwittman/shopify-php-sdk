<?php

namespace Shopify\Enum\Fields;

class PolicyFields extends AbstractObjectEnum
{
    const TITLE = 'title';
    const BODY = 'body';
    const URL = 'url';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'title' => 'string',
            'body' => 'string',
            'url' => 'string',
            'created_at' => 'DateTime',
            'updated_at' => 'DateTime'
        );
    }
}
