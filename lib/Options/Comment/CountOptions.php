<?php

namespace Shopify\Options\Comment;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPublishedAt;

class CountOptions extends BaseOptions
{
    use HasCreatedAt,
        HasPublishedAt,
        HasUpdatedAt;

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

    public function setSinceId($since_id)
    {
        $this->since_id = $since_id;
        return $this;
    }
}
