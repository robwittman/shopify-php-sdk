<?php

namespace Shopify;

class Refund extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = NULL;
    protected static $classUrl = 'refunds';
    protected static $handle = 'refund';
}
