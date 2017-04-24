<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Country extends AbstractObject
{
    use HasId;

    /**
     * The ISO 3166-1 alpha-2 two-letter country code for the country.
     * The code for a given country will be the same as the code for the same country in another shop.
     * @var string
     */
    protected $code;

    /**
     * The full name of the country, in English.
     * @var string
     */
    protected $name;

    /**
     * The sub-regions of a country.
     * @var string
     */
    protected $provinces;

    /**
     * The national sales tax rate to be applied to orders made by customers from that country.
     * @var float
     */
    protected $tax;
}
