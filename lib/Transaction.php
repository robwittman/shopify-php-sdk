<?php

namespace Shopify;

class Transaction extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'refunds';
    protected static $handle = 'refund';
}
