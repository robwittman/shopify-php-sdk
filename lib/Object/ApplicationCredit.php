<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class ApplicationCredit extends AbstractObject
{
    use HasId;

    /**
     * The description of the application credit.
     * @var string
     */
    protected $description;

    /**
     * The amount refunded by the application credit.
     * @var integer
     */
    protected $amount;

    /**
     * States whether or not the application credit is a test transaction.
     * Valid values are "true" or "null".
     * @var string
     */
    protected $test;
}
