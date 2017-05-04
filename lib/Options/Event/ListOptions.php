<?php

namespace Shopify\Options\Event;

use Shopify\Options\BaseOptions;
use Shopify\Concerns\Options\HasCreatedAt;
use Shopify\Concerns\Options\HasPagination;
use Shopify\Concerns\Options\HasFields;
use Shopify\Concerns\Options\HasSinceId;

class ListOptions extends BaseOptions
{
    use HasPagination,
        HasCreatedAt,
        HasFields,
        HasSinceId;

    protected $filter;

    protected $verb;

    public function setFilter($filter)
    {
        $this->filter = $filter;
        return $this;
    }

    public function setVerb($verb)
    {
        $this->verb = $verb;
        return $this;
    }
}
