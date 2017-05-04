<?php

namespace Shopify\Concerns\Options;

trait HasPublishedAt
{
    protected $published_at_min;

    protected $published_at_max;

    public function setPublishedAtMin($published_at_min)
    {
        $this->published_at_min = $published_at_min;
        return $this;
    }

    public function setPublishedAtMax($published_at_max)
    {
        $this->published_at_max = $published_at_max;
        return $this;
    }
}
