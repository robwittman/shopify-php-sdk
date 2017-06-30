<?php

namespace Shopify\Options\ProductVariant;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasFields,
        HasSinceId;
}
