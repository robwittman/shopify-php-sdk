<?php

namespace Shopify\Options\Page;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPublishedAt;

class CountOptions extends BaseOptions
{
    use HasCreatedAt,
        HasUpdatedAt,
        HasPublishedAt;

    protected $title;

    protected $published_status;

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}
