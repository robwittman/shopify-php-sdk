<?php

namespace Shopify;

class CustomerAddress extends AbstractChildObject
{
    protected static $parentUrl = 'customers';
    protected static $parentIdField = NULL;
    protected static $classUrl = 'addresses';
    protected static $handle = 'customer_address';
}
