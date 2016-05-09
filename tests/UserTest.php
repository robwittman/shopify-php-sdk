<?php

namespace Shopify;

class UserTest extends TestCase
{
    public function testListUsers()
    {
        $users = User::all();
        $this->assertInstanceOf('\Shopify\User', $users[0]);
    }

    public function testFetchUser()
    {
        $user = User::get(123421);
        $this->assertInstanceOf('\Shopify\User', $user);
    }

    public function testGetCurrentUser()
    {
        $user = User::getCurrent();
        $this->assertInstanceOf('\Shopify\User', $user);
    }
}
