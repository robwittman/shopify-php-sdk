<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\RecurringApplicationCharge;

class RecurringApplicationChargeService extends AbstractService
{
    public static $className = RecurringApplicationCharge::class;

    public static $endpoint = 'recurring_application_charge';
}
