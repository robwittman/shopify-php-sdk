<?php

namespace Shopify\Enum\Fields;

class RedirectFields extends AbstractObjectEnum
{
    const ID = 'id';
    const PATH = 'path';
    const TARGET = 'target';

    public function getFieldTypes()
    {
        return array(
            'id' => 'integer',
            'path' => 'string',
            'target' => 'string'
        );
    }
}
