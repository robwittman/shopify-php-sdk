<?php

namespace Shopify\Enum\Fields;

class EventFields extends AbstractObjectEnum
{
    const ARGUMENTS = 'arguments';
    const BODY = 'body';
    const CREATED_AT = 'created_at';
    const ID = 'id';
    const DESCRIPTION = 'description';
    const PATH = 'path';
    const MESSAGE = 'message';
    const SUBJECT_ID = 'subject_id';
    const SUBJECT_TYPE = 'subject_type';
    const VERB = 'verb';

    public function getFieldTypes()
    {
        return array(
            'arguments' => 'string',
            'body' => 'string',
            'created_at' => 'DateTime',
            'id' => 'integer',
            'description' => 'string',
            'path' => 'string',
            'message' => 'string',
            'subject_id' => 'string',
            'subject_type' => 'string',
            'verb' => 'string'
        );
    }
}
