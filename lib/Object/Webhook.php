<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Webhook extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $address;
    protected $fields;
    protected $format;
    protected $metafield_namespaces;
    protected $topic;
}
