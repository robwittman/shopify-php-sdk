<?php

namespace Shopify\Enum\Fields;

class ReportFields extends Abstrac
{
    const CATEGORY = 'category';
    const ID = 'id';
    const NAME = 'name';
    const SHOPIFY_QL = 'shopify_ql';
    const UPDATED_AT = 'updated_at';

    public function getFieldTypes()
    {
        return array(
            'category' => 'string',
            'id' => "integer",
            'name' => "string",
            'shopify_ql' => 'string',
            'updated_at' => 'DateTime'
        );
    }
}
