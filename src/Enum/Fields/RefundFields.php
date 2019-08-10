<?php

namespace Shopify\Enum\Fields;

class RefundFields extends AbstractObjectEnum
{
    const CREATED_AT = 'created_at';
    const PROCESSED_AT = 'processed_at';
    const ID = 'id';
    const NOTE = 'note';
    const REFUND_LINE_ITEMS = 'refund_line_items';
    const RESTOCK = 'restock';
    const TRANSACTIONS = 'transactions';
    const USER_ID = 'user_id';

    public function getFieldTypes()
    {
        return array(
            'created_at' => "DateTime",
            'processed_at' => 'string',
            'id' => 'integer',
            'note' => "string",
            'refund_line_items' => 'array',
            'restock' => 'boolean',
            'transactions' => 'array',
            'user_id' => 'integer'
        );
    }
}
