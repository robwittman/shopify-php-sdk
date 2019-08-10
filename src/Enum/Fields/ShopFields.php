<?php

namespace Shopify\Enum\Fields;

class ShopFields extends AbstractObjectEnum
{
    const ADDRESS_1 = 'address1';
    const ADDRESS_2 = 'address2';
    const CITY = 'city';
    const COUNTRY = 'country';
    const COUNTRY_CODE = 'country_code';
    const COUNTRY_NAME = 'country_name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CUSTOMER_EMAIL = 'customer_email';
    const CURRENCY = 'currency';
    const DOMAIN = 'domain';
    const EMAIL = 'email';
    const GOOGLE_APPS_DOMAIN = 'google_apps_domain';
    const GOOGLE_APPS_LOGIN_ENABLED = 'google_apps_login_enabled';
    const ID = 'id';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';
    const MONEY_FORMAT = 'money_format';
    const MONEY_WITH_CURRENCY_FORMAT = 'money_with_currency_format';
    const WEIGHT_UNIT = 'weight_unit';
    const MYSHOPIFY_DOMAIN = 'myshopify_domain';
    const NAME = 'name';
    const PLAN_NAME = 'plan_name';
    const HAS_DISCOUNT = 'has_discounts';
    const HAS_GIFT_CARDS = 'has_gift_cards';
    const PLAN_DISPLAY_NAME = 'plan_display_name';
    const PASSWORD_ENABLED = 'password_enabled';
    const PHONE = 'phone';
    const PRIMARY_LOCALE = 'primary_locale';
    const PROVINCE = 'province';
    const PROVINCE_CODE = 'province_code';
    const SHOP_OWNER = 'shop_owner';
    const SOURCE = 'source';
    const FORCE_SSL = 'force_ssl';
    const TAX_SHIPPING = 'tax_shipping';
    const TAXES_INCLUDED = 'taxes_included';
    const COUNTY_TAXES = 'county_taxes';
    const TIMEZONE = 'timezone';
    const IANA_TIMEZONE = 'iana_timezone';
    const ZIP = 'zip';
    const HAS_STOREFRONT = 'has_storefront';
    const SETUP_REQUIRED = 'setup_required';

    public function getFieldTypes()
    {
        return array(
            'address1' => 'string',
            'address2' => 'string',
            'city' => 'string',
            'country' => 'string',
            'country_code' => 'string',
            'country_name' => 'string',
            'created_at' => 'DateTime',
            'updated_at' => 'DateTime',
            'customer_email' => 'string',
            'currency' => 'string',
            'domain' => 'string',
            'email' => 'string',
            'google_apps_domain' => 'string',
            'google_apps_login_enabled' => 'boolean',
            'id' => 'integer',
            'latitude' => 'string',
            'longitude' => 'string',
            'money_format' => 'string',
            'money_with_currency_format' => 'string',
            'weight_unit' => 'string',
            'myshopify_domain' => 'string',
            'name' => 'string',
            'plan_name' => 'string',
            'has_discount' => 'boolean',
            'has_gift_cards' => 'boolean',
            'plan_display_name' => 'string',
            'password_enabled' => 'boolean',
            'phone' => 'string',
            'primary_locale' => 'string',
            'province' => 'string',
            'province_code' => 'string',
            'shop_owner' => 'string',
            'source' => 'string',
            'force_ssl' => 'boolean',
            'tax_shipping' => 'boolean',
            'taxes_included' => 'boolean',
            'county_taxes' => 'string',
            'timezone' => 'string',
            'iana_timezone' => 'string',
            'zip' => 'string',
            'has_storefront' => 'boolean',
            'setup_required' => 'boolean'
        );
    }
}
