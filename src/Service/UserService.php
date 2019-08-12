<?php

namespace Shopify\Service;

use Shopify\Object\User;

class UserService extends AbstractService
{
    /**
     * Receive a list of all Users
     *
     * @link   https://help.shopify.com/api/reference/user#index
     * @return User[]
     */
    public function all()
    {
        $endpoint = 'users.json';
        $response = $this->request($endpoint);
        return $this->createCollection(User::class, $response['users']);
    }

    /**
     * Receive a single user
     *
     * @link   https://help.shopify.com/api/reference/user#show
     * @param  integer $userId
     * @return User
     */
    public function get($userId)
    {
        $endpoint = 'users/'.$userId.'.json';
        $response = $this->request($endpoint);
        return $this->createObject(User::class, $response['user']);
    }
}
