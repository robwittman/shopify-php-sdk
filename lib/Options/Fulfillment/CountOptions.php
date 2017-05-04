<?php

namespace Shopify\Options\Fulfillment;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;

class CountOptions extends BaseOptions
{
    use HasCreatedAt,
        HasUpdatedAt;
}
