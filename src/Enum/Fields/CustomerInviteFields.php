<?php

namespace Shopify\Enum\Fields;

class CustomerInviteFields extends AbstractObjectEnum
{
    const TO = 'to';
    const FROM = 'from';
    const BCC = 'bcc';
    const SUBJECT = 'subject';
    const CUSTOM_MESSAGE = 'custom_message';

    public function getFieldTypes()
    {
        return array(
            'to' => 'string',
            'from' => 'string',
            'bcc' => 'array',
            'subject' => 'string',
            'custom_message' => 'string'
        );
    }
}
