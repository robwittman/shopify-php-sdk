<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class GiftCard extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $api_client_id;
    protected $user_id;
    protected $order_id;
    protected $line_item_id;
    protected $balance;
    protected $currency;
    protected $code;
    protected $last_characters;
    protected $note;
    protected $template_suffix;
    protected $disabled_at;
    protected $expires_on;
}
