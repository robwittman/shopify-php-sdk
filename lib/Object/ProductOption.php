<?php

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class ProductOption extends AbstractObject
{
    use HasId;

    protected $product_id;

    protected $name;

    protected $position;

    protected $values;

    public function getProductId()
    {
        return $this->product_id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getValues()
    {
        return $this->values;
    }
}
