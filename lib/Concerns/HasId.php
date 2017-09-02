<?php

namespace Shopify\Concerns;

trait HasId
{
    /**
     * A unique numeric identifier for the shop.
     * @var integer
     */
    protected $id;

    public function getId()
    {
        return $this->id;
    }
}
