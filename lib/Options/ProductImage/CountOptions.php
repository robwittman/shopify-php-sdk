<?php

namespace Shopify\Options\ProductImage2;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPublishedAt;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPublishedAt,
        HasCreatedAt,
        HasUpdatedAt,
        HasSinceId;
}
