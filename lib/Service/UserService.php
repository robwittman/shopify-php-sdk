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
        $request = $this->createRequest('/admin/users.json');
        return $this->getEdge($request, array(), User::class);
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
        $request = $this->createRequest('/admin/users/'.$userId.'.json');
        return $this->getNode($request, array(), User::class);
    }
}
