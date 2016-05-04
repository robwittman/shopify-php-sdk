<?php

namespace Shopify;

class ProductVariant extends AbstractChildObject
{
    protected static $parentUrl = 'countries';
    protected static $parentIdField = 'country_id';
    protected static $classUrl = 'provinces';
    protected static $handle = 'province';
}
