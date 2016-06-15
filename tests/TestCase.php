<?php

namespace Shopify;

class TestCase extends \PHPUnit_Framework_TestCase
{
    protected $client;

    public function setUp()
    {
        Shopify::init(['test' => TRUE]);
    }
}
