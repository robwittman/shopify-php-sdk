<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Metafield extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $description;
    protected $key;
    protected $namespace;
    protected $owner_id;
    protected $owner_resource;
    protected $value;
    protected $value_type;
}
