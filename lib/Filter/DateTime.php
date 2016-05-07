<?php

namespace Shopify\Filter;

class DateTime
{

    public static function fromTimestamp($timestamp)
    {
        return date(DATE_ISO8601, $timestamp);
    }

    public static function fromString($string)
    {
        return date(DATE_ISO8601, strtotime($string));
    }
}
