<?php

namespace Shopify\Options\Article;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPublishedAt;

class CountOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasPublishedAt,
        HasUpdatedAt;

    protected $published_status;

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}
