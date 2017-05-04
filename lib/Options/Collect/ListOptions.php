<?php

namespace Shopify\Options\Collect;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasFields;
}
