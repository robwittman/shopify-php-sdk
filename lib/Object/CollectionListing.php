<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;

class CollectionListing extends AbstractObject
{
    use HasTimestamps;

    protected $collection_id;
    protected $body_html;
    protected $default_product_image;
    protected $image;
    protected $handle;
    protected $published_at;
    protected $title;
    protected $sort_order;
}
