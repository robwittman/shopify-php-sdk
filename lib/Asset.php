<?php

namespace Shopify;

class Asset extends AbstractChildObject
{
    protected static $parentIdField = 'theme_id';
    protected static $parentUrl = 'themes';
    protected static $handle = 'asset';
    protected static $classUrl = 'assets';
}
