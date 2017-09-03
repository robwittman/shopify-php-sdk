<?php

namespace Shopify\Enum\Fields;

class TransactionFields extends AbstractObjectEnum
{
    const AMOUNT = 'amount';
    const AUTHORIZATION = 'authorization';
    const CREATED_AT = 'created_at';
    const DEVICE_ID = 'device_id';
    const GATEWAY = 'gateway';
    const SOURCE_NAME = 'source_name';
    const PAYMENT_DETAILS = 'payment_details';
    const ID = 'id';
    const KIND = 'kind';
    const ORDER_ID = 'order_id';
    const RECEIPT = 'receipt';
    const ERROR_CODE = 'error_code';
    const STATUS = 'status';
    const TEST = 'test';
    const USER_ID = 'user_id';
    const CURRENCY = 'currency';

    public function getFieldTypes()
    {
        return array(
            'amount' => 'string',
            'authorization' => 'string',
            'created_at' => "DateTime",
            'device_id' => 'string',
            'gateway' => 'string',
            'source_name' => 'string',
            'payment_details' => 'array',
            'id' => 'integer',
            'kind' => 'string',
            'order_id' => 'integer',
            'receipt' => 'object',
            'error_code' => 'string',
            'status' => 'string',
            'test' => 'boolean',
            'user_id' => 'integer',
            'currency' => 'string'
        );
    }
}
