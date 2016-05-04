<?php

namespace Shopify;

class OrderRisks extends AbstractChildObject
{
    protected static $parentUrl = 'orders';
    protected static $parentIdField = 'order_id';
    protected static $classUrl = 'risks';
    protected static $handle = 'risk';
}
