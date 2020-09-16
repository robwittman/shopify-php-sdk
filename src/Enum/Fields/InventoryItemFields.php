<?php

namespace Shopify\Enum\Fields;

class InventoryItemFields extends AbstractObjectEnum
{
    const COST                              = 'cost';                               //The unit cost of the inventory item.
    const COUNTRY_CODE_OF_ORIGIN            = 'country_code_of_origin';             //The two-digit code for the country where the inventory item was made.
    const COUNTRY_HARMONIZED_SYSTEM_CODES   = 'country_harmonized_system_codes';    //An array of country-specific Harmonized System (HS) codes for the item. Used to determine duties when shipping the inventory item to certain countries.
    const CREATED_AT                        = 'created_at';                         //The date and time (ISO 8601 format) when the inventory item was created.
    const HARMONIZED_SYSTEM_CODE            = 'harmonized_system_code';             //The general Harmonized System (HS) code for the inventory item. Used if a country-specific HS code is not available. 
    const ID                                = 'id';                                 //The ID of the inventory item.
    const PROVINCE_CODE_OF_ORIGIN           = 'province_code_of_origin';            //The two-digit code for the province where the inventory item was made. Used only if the shipping provider for the inventory item is Canada Post.
    const SKU                               = 'sku';                                //The unique SKU (stock keeping unit) of the inventory item.
    const TRACKED                           = 'tracked';                            //Whether the inventory item is tracked. If true, then inventory quantity changes are tracked by Shopify.

    public function getFieldTypes()
    {
        return array(
            'cost'                              => 'integer',
            'country_code_of_origin'            => 'string',
            'country_harmonized_system_codes'   => 'string',
            'harmonized_system_code'            => 'integer',
            'id'                                => 'integer',
            'province_code_of_origin'           => 'string',
            'sku'                               => 'string',
            'tracked'                           => 'boolean',
        );
    }
}