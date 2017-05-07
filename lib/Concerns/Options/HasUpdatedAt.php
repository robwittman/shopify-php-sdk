<?php

namespace Shopify\Concerns\Options;

trait HasUpdatedAt
{
    protected $updated_at_min;

    protected $updated_at_max;

    public function setUpdatedAtMin($updated_at_min)
    {
        $this->updated_at_min = $updated_at_min;
        return $this;
    }

    public function getUpdatedAtMin()
    {
        return $this->updated_at_min;
    }
}
