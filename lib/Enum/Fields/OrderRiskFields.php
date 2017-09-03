<?php

namespace Shopify\Enum\Fields;

class OrderRiskFields extends AbstractObjectEnum
{
    const CAUSE_CANCEL = 'cause_cancel';
    const DISPLAY = 'display';
    const ID = 'id';
    const ORDER_ID = 'order_id';
    const MESSAGE = 'message';
    const RECOMMENDATION = 'recommendation';
    const SCORE = 'score';
    const SOURCE = 'source';

    public function getFieldTypes()
    {
        return array(
            'cause_cancel' => 'boolean',
            'display' => 'boolean',
            'id' => 'integer',
            'order_id' => 'integer',
            'message' => 'string',
            'recommendation' => 'string',
            'score' => 'string',
            'source' => 'string'
        );
    }
}
