<?php

namespace Shopify\Options\MarketingEvent;

use Shopify\Options\BaseOptions;

class ListOptions extends BaseOptions
{
    protected $limit;

    protected $offset;

    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }
}
