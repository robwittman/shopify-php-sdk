<?php

namespace Shopify\Concerns\Options;

trait HasSinceId
{
    protected $since_id;

    public function setSinceId($since_id)
    {
        $this->since_id = $since_id;
        return $this;
    }
}
