<?php

namespace Shopify\Options\Transaction;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasFields,
        HasSinceId;
}
