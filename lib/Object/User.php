<?php

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class User extends AbstractObject
{
    use HasTimestamps,
        HasId;

    protected $account_owner;
    protected $bio;
    protected $email;
    protected $first_name;
    protected $im;
    protected $last_name;
    protected $permissions;
    protected $phone;
    protected $pin;
    protected $receive_announcements;
    protected $screen_name;
    protected $url;
    protected $user_type;
}
