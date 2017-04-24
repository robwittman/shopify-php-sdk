<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;
use Shopify\Concerns\HasTimestamps;

class ApplicationCharge extends AbstractObject
{
    /**
     * The URL that the customer is taken to, to accept or decline the one-time application charge.
     * @var string
     */
    protected $confirmation_url;

    /**
     * The name of the one-time application charge.
     * @var string
     */
    protected $name;

    /**
     * The price of the one-time application charge.
     * @var float
     */
    protected $price;

    /**
     * The URL the customer is sent to once they accept/decline a charge.
     * @var string
     */
    protected $return_url;

    /**
     * The status of the application charge
     * @var string
     */
    protected $status;

    /**
     * States whether or not the application charge is a test transaction. Valid values are "true" or "null".
     * @var string
     */
    protected $test;
}
