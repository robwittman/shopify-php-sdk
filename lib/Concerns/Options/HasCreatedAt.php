<?php

namespace Shopify\Concerns\Options;

trait HasCreatedAt
{
    protected $created_at_min;

    protected $created_at_max;

    public function setCreatedAtMin($created_at_min)
    {
        $this->created_at_min = $created_at_min;
        return $this;
    }

    public function getCreatedAtMin()
    {
        return $this->created_at_min;
    }
}
