<?php

namespace Shopify\Options\Page;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasSinceId;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPublishedAt;
use Shopify\Concerns\Options\HasFields;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasFields,
        HasUpdatedAt,
        HasPublishedAt,
        HasSinceId;

    protected $title;

    protected $handle;

    protected $published_status;

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}
