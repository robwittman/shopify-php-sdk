<?php

namespace Shopify

class UsageCharge extends AbstractChildObject
{
    protected static $parentUrl = 'recurring_application_charges';
    protected static $parentIdField = 'recurring_application_charge_id';
    protected static $classUrl = 'refunds';
    protected static $handle = 'refund';
}
