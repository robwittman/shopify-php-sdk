<?php

namespace Shopify\Enum\Fields;

class UserFields extends AbstractObjectEnum
{
    const ACCOUNT_OWNER = 'account_owner';
    const BIO = 'bio';
    const EMAIL = 'email';
    const FIRST_NAME = 'first_name';
    const ID = 'id';
    const IM = 'im';
    const LAST_NAME = 'last_name';
    const PERMISSIONS = 'permissions';
    const PHONE = 'phone';
    const PIN = 'pin';
    const RECEIVE_ANNOUNCEMENTS = 'receive_announcements';
    const SCREEN_NAME = 'screen_name';
    const URL = 'url';
    const USER_TYPE = 'user_type';

    public function getFieldTypes()
    {
        return array(
            'account_owner' => 'boolean',
            'bio' => 'string',
            'email' => 'string',
            'first_name' => 'string',
            'id' => 'integer',
            'im' => 'string',
            'last_name' => 'string',
            'permissions' => 'array',
            'phone' => 'string',
            'pin' => "string",
            'receive_announcements' => 'boolean',
            'screen_name' => 'string',
            'url' => 'string',
            'user_type' => 'string'
        );
    }
}
