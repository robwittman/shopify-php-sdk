<?php

namespace Shopify\Enum\Fields;

class ShippingLineFields extends AbstractObjectEnum
{
    const CODE = 'code';
    const PRICE = 'price';
    const SOURCE = 'source';
    const TITLE = 'title';
    const TAX_LINES = 'tax_lines';
    const CARRIER_IDENTIFIER = 'carrier_identifier';
    const REQUESTED_FULFILLMENT_SERVICE_ID = 'requested_fulfillment_service_id';

    public function getFieldTypes()
    {
        return array(
            'code' => 'string',
            'price' => 'string',
            'source' => 'string',
            'title' => 'string',
            'tax_lines' => 'TaxLine[]',
            'carrier_identifer' => 'string',
            'requested_fulfillment_service_id' => 'string'
        );
    }
}
