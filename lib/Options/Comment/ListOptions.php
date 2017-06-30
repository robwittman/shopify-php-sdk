<?php

namespace Shopify\Options\Comment;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasPublishedAt;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasPublishedAt,
        HasFields,
        HasUpdatedAt,
        HasSinceId;

    protected $published_status;

    protected $status;

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}
