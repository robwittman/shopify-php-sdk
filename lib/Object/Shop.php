<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Shop extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The shop's street address.
     * @var string
     */
    protected $address1;

    /**
     * The shop's additional street address (apt, suite, etc.).
     * @var string
     */
    protected $address2;

    /**
     * The city in which the shop is located.
     * @var string
     */
    protected $city;

    /**
     * The shop's country (by default equal to the two-letter country code)
     * @var string
     */
    protected $country;

    /**
     * The two-letter country code corresponding to the shop's coun
     * @var string
     */
    protected $country_code;

    /**
     * The shop's normalized country name.
     * @var string
     */
    protected $country_name;

    /**
     * The customer's email.
     * @var string
     */
    protected $customer_email;

    /**
     * The three-letter code for the currency that the shop accepts.
     * @var string
     */
    protected $currency;

    /**
     * The shop's domain.
     * @var string
     */
    protected $domain;

    /**
     * The contact email address for the shop.
     * @var string
     */
    protected $email;

    /**
     * Feature is present when a shop has a google app domain.
     * It will be returned as a URL. If the shop does not have this feature
     * enabled it will default to "null."
     * @var string
     */
    protected $google_apps_domain;

    /**
     * Feature is present if a shop has google apps enabled.
     * Those shops with this feature will be able to login to the google apps login.
     * Shops without this feature enabled will default to "null."
     * @var string
     */
    protected $google_apps_login_enabled;

    /**
     * Geographic coordinate specifying the north/south location of a shop.
     * @var float
     */
    protected $latitude;

    /**
     * Geographic coordinate specifying the east/west location of a shop.
     * @var float
     */
    protected $longitude;

    /**
     * A string representing the way currency is formatted when the currency isn't specified.
     * @var string
     */
    protected $money_format;

    /**
     * A string representing the way currency is formatted when the currency is specified.
     * @var string
     */
    protected $money_with_currency_format;

    /**
     * A string representing the default unit of weight measurement for the shop.
     * @var string
     */
    protected $weight_unit;

    /**
     * The shop's 'myshopify.com' domain.
     * @var string
     */
    protected $myshopify_domain;

    /**
     * The name of the shop.
     * @var string
     */
    protected $name;

    /**
     * The name of the Shopify plan the shop is on.
     * @var string
     */
    protected $plan_name;

    /**
     * Indicates if any active discounts exist for the shop.
     * @var boolean
     */
    protected $has_discounts;

    /**
     * Indicates if any active gift cards exist for the shop.
     * @var boolean
     */
    protected $has_gift_cards;

    /**
     * The display name of the Shopify plan the shop is on.
     * @var string
     */
    protected $plan_display_name;

    /**
     * Indicates whether the Storefront password protection is enabled.
     * @var boolean
     */
    protected $password_enabled;

    /**
     * The contact phone number for the shop.
     * @var string
     */
    protected $phone;

    /**
     * The shop's primary locale.
     * @var string
     */
    protected $primary_locale;

    /**
     * The shop's normalized province or state name.
     * @var string
     */
    protected $province;

    /**
     * The two-letter code for the shop's province or state.
     * @var string
     */
    protected $province_code;

    /**
     * The username of the shop owner.
     * @var string
     */
    protected $shop_owner;

    /**
     * @var string
     */
    protected $source;

    /**
     * Indicates whether the shop forces requests made to
     * its resources to be made over SSL, using the HTTPS protocol.
     * If true, HTTP requests will be redirected to HTTPS.
     * @var boolean
     */
    protected $force_ssl;

    /**
     * Specifies whether or not taxes were charged for shipping. Valid values are: "true" or "false."
     * @var boolean
     */
    protected $tax_shipping;

    /**
     * The setting for whether applicable taxes are included in product prices. Valid values are: "true" or "null."
     * @var mixed
     */
    protected $taxes_included;

    /**
     * The setting for whether the shop is applying taxes on a
     * per-county basis or not (US-only). Valid values are: "true" or "null."
     * @var mixed
     */
    protected $county_taxes;

    /**
     * The name of the timezone the shop is in.
     * @var string
     */
    protected $timezone;

    /**
     * The named timezone assigned by the IANA.
     * @var string
     */
    protected $iana_timezone;

    /**
     * The zip or postal code of the shop's address.
     * @var string
     */
    protected $zip;

    /**
     * Indicates whether the shop has web-based storefront or not.
     * @var boolean
     */
    protected $has_storefront;

    /**
     * Indicates whether the shop has any outstanding setup steps or not.
     * @var boolean
     */
    protected $setup_required;
}
