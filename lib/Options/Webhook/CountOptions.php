<?php

namespace Shopify\Options\Webhook;

use Shopify\Options\BaseOptions;

class CountOptions extends BaseOptions
{
    protected $address;

    protected $topic;

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }
}
