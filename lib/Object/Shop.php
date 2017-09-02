<?php
/**
 *
 * Shopify\Object\Shop
 *
 * The Shopify API's shop object is a collection of the general settings and information about the shop.
 *
 * MIT License
 *
 * Copyright (c) Rob Wittman 2016
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package Shopify
 * @author Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/shop
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Shop extends AbstractObject
{
    public static function getApiHandle()
    {
        return 'shop';
    }

    protected $id;

    protected $created_at;

    protected $updated_at;
    
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

    protected $money_in_emails_format;

    protected $money_with_currency_in_emails_format;

    protected $eligible_for_payments;

    protected $requires_extra_payments_agreement;

    protected $eligible_for_card_reader_giveaway;

    protected $finances;


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

    protected $primary_location_id;

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

    public function getAddress1()
    {
        return $this->get('address1');
    }

    public function setAddress1($address1)
    {
        $this->set('address1', $address1);
        return $this;
    }

    public function getAddress2()
    {
        return $this->get('address2');
    }

    public function setAddress2($address2)
    {
        $this->set('address2', $address2);
        return $this;
    }

    public function getCity()
    {
        return $this->get('city');
    }

    public function setCity($city)
    {
        $this->set('city', $city);
        return $this;
    }

    public function getCountry()
    {
        return $this->get('country');
    }

    public function setCountry($country)
    {
        $this->set('country', $country);
        return $this;
    }

    public function getCountryCode()
    {
        return $this->get('country_code');
    }

    public function setCountryCode($country_code)
    {
        $this->set('country_code', $country_code);
        return $this;
    }

    public function getCountryName()
    {
        return $this->get('country_name');
    }

    public function setCountryName($country_name)
    {
        $this->set('country_name', $country_name);
        return $this;
    }

    public function getCustomerEmail()
    {
        return $this->get('customer_email');
    }

    public function setCustomerEmail($customer_email)
    {
        $this->set('customer_email', $customer_email);
        return $this;
    }

    public function getCurrency()
    {
        return $this->get('currency');
    }

    public function setCurrency($currency)
    {
        $this->set('currency', $currency);
        return $this;
    }

    public function getDomain()
    {
        return $this->get('domain');
    }

    public function setDomain($domain)
    {
        $this->set('domain', $domain);
        return $this;
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function setEmail($email)
    {
        $this->set('email', $email);
        return $this;
    }

    public function getGoogleAppsDomain()
    {
        return $this->get('google_apps_domain');
    }

    public function setGoogleAppsDomain($google_apps_domain)
    {
        $this->set('google_apps_domain', $google_apps_domain);
        return $this;
    }

    public function getGoogleAppsLoginEnabled()
    {
        return $this->get('google_apps_login_enabled');
    }

    public function setGoogleAppsLoginEnabled($google_apps_login_enabled)
    {
        $this->set('google_apps_login_enabled', $google_apps_login_enabled);
        return $this;
    }

    public function getLatitude()
    {
        return $this->get('latitude');
    }

    public function setLatitude($latitude)
    {
        $this->set('latitude', $latitude);
        return $this;
    }

    public function getLongitude()
    {
        return $this->get('longitude');
    }

    public function setLongitude($longitude)
    {
        $this->set('longitude', $longitude);
        return $this;
    }

    public function getMoneyFormat()
    {
        return $this->get('money_format');
    }

    public function setMoneyFormat($money_format)
    {
        $this->set('money_format', $money_format);
        return $this;
    }

    public function getMoneyWithCurrencyFormat()
    {
        return $this->get('money_with_currency_format');
    }

    public function setMoneyWithCurrencyFormat($money_with_currency_format)
    {
        $this->set('money_with_currency_format', $money_with_currency_format);
        return $this;
    }

    public function getMoneyInEmailsFormat()
    {
        return $this->get('money_in_emails_format');
    }

    public function setMoneyInEmailsFormat($money_in_emails_format)
    {
        $this->set('money_in_emails_format', $money_in_emails_format);
        return $this;
    }

    public function getMoneyWithCurrencyInEmailsFormat()
    {
        return $this->get('money_with_currency_in_emails_format');
    }

    public function setMoneyWithCurrencyInEmailsFormat($money_with_currency_in_emails_format)
    {
        $this->set('money_with_currency_in_emails_format', $money_with_currency_in_emails_format);
        return $this;
    }

    public function getEligibleForPayments()
    {
        return $this->get('eligible_for_payments');
    }

    public function setEligibleForPayments($eligible_for_payments)
    {
        $this->set('eligible_for_payments', $eligible_for_payments);
        return $this;
    }

    public function getRequiresExtraPaymentsAgreement()
    {
        return $this->get('requires_extra_payments_agreement');
    }

    public function setRequiresExtraPaymentsAgreement($requires_extra_payments_agreement)
    {
        $this->set('requires_extra_payments_agreement', $requires_extra_payments_agreement);
        return $this;
    }

    public function getEligibleForCardReaderGiveaway()
    {
        return $this->get('eligible_for_card_reader_giveaway');
    }

    public function setEligibleForCardReaderGiveaway($eligible_for_card_reader_giveaway)
    {
        $this->set('eligible_for_card_reader_giveaway', $eligible_for_card_reader_giveaway);
        return $this;
    }

    public function getFinances()
    {
        return $this->get('finances');
    }

    public function setFinances($finances)
    {
        $this->set('finances', $finances);
        return $this;
    }

    public function getWeightUnit()
    {
        return $this->get('weight_unit');
    }

    public function setWeightUnit($weight_unit)
    {
        $this->set('weight_unit', $weight_unit);
        return $this;
    }

    public function getMyshopifyDomain()
    {
        return $this->get('myshopify_domain');
    }

    public function setMyshopifyDomain($myshopify_domain)
    {
        $this->set('myshopify_domain', $myshopify_domain);
        return $this;
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
        return $this;
    }

    public function getPlanName()
    {
        return $this->get('plan_name');
    }

    public function setPlanName($plan_name)
    {
        $this->set('plan_name', $plan_name);
        return $this;
    }

    public function getHasDiscounts()
    {
        return $this->get('has_discounts');
    }

    public function setHasDiscounts($has_discounts)
    {
        $this->set('has_discounts', $has_discounts);
        return $this;
    }

    public function getHasGiftCards()
    {
        return $this->get('has_gift_cards');
    }

    public function setHasGiftCards($has_gift_cards)
    {
        $this->set('has_gift_cards', $has_gift_cards);
        return $this;
    }

    public function getPlanDisplayName()
    {
        return $this->get('plan_display_name');
    }

    public function setPlanDisplayName($plan_display_name)
    {
        $this->set('plan_display_name', $plan_display_name);
        return $this;
    }

    public function getPasswordEnabled()
    {
        return $this->get('password_enabled');
    }

    public function setPasswordEnabled($password_enabled)
    {
        $this->set('password_enabled', $password_enabled);
        return $this;
    }

    public function getPhone()
    {
        return $this->get('phone');
    }

    public function setPhone($phone)
    {
        $this->set('phone', $phone);
        return $this;
    }

    public function getPrimaryLocale()
    {
        return $this->get('primary_locale');
    }

    public function setPrimaryLocale($primary_locale)
    {
        $this->set('primary_locale', $primary_locale);
        return $this;
    }

    public function getPrimaaryLocationId()
    {
        return $this->get('primary_location_id');
    }

    public function setPrimaaryLocationId($primary_location_id)
    {
        $this->set('primary_location_id', $primary_location_id);
        return $this;
    }

    public function getProvince()
    {
        return $this->get('province');
    }

    public function setProvince($province)
    {
        $this->set('province', $province);
        return $this;
    }

    public function getProvinceCode()
    {
        return $this->get('province_code');
    }

    public function setProvinceCode($province_code)
    {
        $this->set('province_code', $province_code);
        return $this;
    }

    public function getShopOwner()
    {
        return $this->get('shop_owner');
    }

    public function setShopOwner($shop_owner)
    {
        $this->set('shop_owner', $shop_owner);
        return $this;
    }

    public function getSource()
    {
        return $this->get('source');
    }

    public function setSource($source)
    {
        $this->set('source', $source);
        return $this;
    }

    public function getForceSsl()
    {
        return $this->get('force_ssl');
    }

    public function setForceSsl($force_ssl)
    {
        $this->set('force_ssl', $force_ssl);
        return $this;
    }

    public function getTaxShipping()
    {
        return $this->get('tax_shipping');
    }

    public function setTaxShipping($tax_shipping)
    {
        $this->set('tax_shipping', $tax_shipping);
        return $this;
    }

    public function getTaxesIncluded()
    {
        return $this->get('taxes_included');
    }

    public function setTaxesIncluded($taxes_included)
    {
        $this->set('taxes_included', $taxes_included);
        return $this;
    }

    public function getCountyTaxes()
    {
        return $this->get('county_taxes');
    }

    public function setCountyTaxes($county_taxes)
    {
        $this->set('county_taxes', $county_taxes);
        return $this;
    }

    public function getTimezone()
    {
        return $this->get('timezone');
    }

    public function setTimezone($timezone)
    {
        $this->set('timezone', $timezone);
        return $this;
    }

    public function getIanaTimezone()
    {
        return $this->get('iana_timezone');
    }

    public function setIanaTimezone($iana_timezone)
    {
        $this->set('iana_timezone', $iana_timezone);
        return $this;
    }

    public function getZip()
    {
        return $this->get('zip');
    }

    public function setZip($zip)
    {
        $this->set('zip', $zip);
        return $this;
    }

    public function getHasStorefront()
    {
        return $this->get('has_storefront');
    }

    public function setHasStorefront($has_storefront)
    {
        $this->set('has_storefront', $has_storefront);
        return $this;
    }

    public function getSetupRequired()
    {
        return $this->get('setup_required');
    }

    public function setSetupRequired($setup_required)
    {
        $this->set('setup_required', $setup_required);
        return $this;
    }
}
