<?php

namespace Shopify\Object;

class Address extends AbstractObject
{
    /**
     * The street address of the billing address.
     * @var string
     */
    protected $address1;

    /**
     * An optional additional field for the street address of the billing address.
     * @var string
     */
    protected $address2;

    /**
     * The city of the billing address
     * @var string
     */
    protected $city;

    /**
     * The company of the person associated with the billing address
     * @var string
     */
    protected $company;

    /**
     * The name of the country of the billing address.
     * @var string
     */
    protected $country;

    /**
     * The two-letter code (ISO 3166-1 alpha-2 two-letter country code) for the country of the billing address.
     * @var string
     */
    protected $country_code;

    /**
     * The first name of the person associated with the payment method.
     * @var string
     */
    protected $first_name;

    /**
     * The last name of the person associated with the payment method.
     * @var string
     */
    protected $last_name;

    /**
     * The latitude of the billing address.
     * @var float
     */
    protected $latitude;

    /**
     * The longitude of the billing address.
     * @var float
     */
    protected $longitude;

    /**
     * The full name of the person associated with the payment method.
     * @var string
     */
    protected $name;

    /**
     * The phone number at the billing address.
     * @var string
     */
    protected $phone;

    /**
     * The name of the state or province of the billing address.
     * @var string
     */
    protected $province;

    /**
     * The two-letter abbreviation of the state or province of the billing address.
     * @var string
     */
    protected $province_code;

    /**
     * The zip or postal code of the billing address.
     * @var string
     */
    protected $zip;
}
