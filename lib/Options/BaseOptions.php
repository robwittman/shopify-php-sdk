<?php

namespace Shopify\Options;

class BaseOptions
{
    public function export()
    {
        return array_filter(get_object_vars($this));
    }
}
