<?php

namespace Shopify\Enum\Fields;

class TaxLineFields extends AbstractObjectEnum
{
    const PRICE = 'price';
    const RATE = 'rate';
    const TITLE = 'title';

    public function getFieldTypes()
    {
        return array(
            'price' => 'string',
            'rate' => 'string',
            'title' => 'string'
        );
    }
}
