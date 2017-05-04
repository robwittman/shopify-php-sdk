<?php

namespace Shopify\Options\Article;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasUpdatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasPublishedAt;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasPublishedAt,
        HasFields,
        HasUpdatedAt;

    protected $published_status;

    protected $handle;

    protected $tag;

    protected $author;

    public function setHandle($handle)
    {
        $this->handle = $handle;
        return $this;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    public function setPublishedStatus($published_status)
    {
        $this->published_status = $published_status;
        return $this;
    }
}
