<?php

namespace Shopify\Concerns\Options;

trait HasFields
{
    protected $fields;

    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }
}
