<?php

namespace Shopify\Service;

use GuzzleHttp\Psr7\Request;
use Shopify\Object\User;

class UserService extends AbstractService
{
    public static $className = User::class;

    public static $endpoint = 'users';
}
