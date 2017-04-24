<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;

class Location extends AbstractObject
{
    use HasTimestamps;

    protected $title;
    protected $body;
    protected $url;
}
