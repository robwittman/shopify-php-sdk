<?php

namespace Shopify\Enum\Fields;

class GiftCardFieds extends AbstractObjectEnum
{
    const ID = 'id';
    const API_CLIENT_ID = 'api_client_id';
    const USER_ID = 'user_id';
    const ORDER_ID = 'order_id';
    const CUSTOMER_ID = 'customer_id';
    const LINE_ITEM_ID = 'line_item_id';
    const BALANCE = 'balance';
    const CURRENCY = 'currency';
    const CODE = 'code';
    const LAST_CHARACTERS = 'last_characters';
    const NOTE = 'note';
    const TEMPLATE_SUFFIX = 'template_suffix';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DISABLED_AT = 'disabled_at';
    const EXPIRES_ON = 'expires_on';

    public function getFieldTypes()
    {
        return array(
            'id' => 'integer',
            'api_client_id' => 'string',
            'user_id' => 'integer',
            'order_id' => 'integer',
            'customer_id' => 'integer',
            'line_item_id' => 'integer',
            'balance' => 'string',
            'currency' => 'string',
            'code' => 'string',
            'last_characters' => 'string',
            'note' => 'string',
            'template_suffix' => 'string',
            'created_at' => "DateTime",
            'updated_at' => 'DateTime',
            'disabled_at' => 'DateTime',
            'expires_on' => 'string'
        );
    }
}
