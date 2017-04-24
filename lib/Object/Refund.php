<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Refund extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $processed_at;
    protected $note;
    protected $refund_line_items;
    protected $restock;
    protected $transactions;
    protected $user_id;
}
