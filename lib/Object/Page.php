<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Page extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $author;
    protected $body_html;
    protected $handle;
    protected $metafield;
    protected $published_at;
    protected $shop_id;
    protected $template_suffix;
    protected $title;
}
