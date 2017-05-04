<?php
/**
 *
 * Shopify\Object\User
 *
 * MIT License
 *
 * Copyright (c) Rob Wittman 2016
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @package Shopify
 * @author Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link https://help.shopify.com/api/reference/user
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class User extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * Identifies if the user is the owner of the Shopify account
     * @var boolean
     */
    protected $account_owner;

    /**
     * User specified description of oneself
     * @var string
     */
    protected $bio;

    /**
     * Email address associated with this account
     * @var string
     */
    protected $email;

    /**
     * The first name of the account user
     * @var string
     */
    protected $first_name;

    /**
     * The IM account address
     * @var string
     */
    protected $im;

    /**
     * The last name of the account user
     * @var string
     */
    protected $last_name;

    /**
     * The permissions that the account has. Users will either have "full" or "limited" permissions.
     * Limited permissions are scoped to a user in that they can only view certain parts of the Shopify Admin
     * @var array
     */
    protected $permissions;

    /**
     * Phone number associated with the account
     * @var string
     */
    protected $phone;

    /**
     * Point of Sale Access Code for this account. Pin is deprecated and will be removed on 2014-08-01.
     * @deprecated
     * @var string
     */
    protected $pin;

    /**
     * Whether or not this account will receive email announcements from Shopify
     * @var string
     */
    protected $receive_announcements;

    /**
     * @deprecated
     * @var string
     */
    protected $screen_name;

    /**
     * Homepage or other web address
     * @var string
     */
    protected $url;

    /**
     * The type that the account is:
     *
     * regular - A normal account that can access the web admin
     * open_id - A user account that uses google authentication to access web admin
     * restricted - A user account that cannot access the web admin
     * @var string
     */
    protected $user_type;

    public function getAccountOwner()
    {
        return $this->get('account_owner');
    }

    public function setAccountOwner($account_owner)
    {
        $this->set('account_owner', $account_owner);
        return $this;
    }

    public function getBio()
    {
        return $this->get('bio');
    }

    public function setBio($bio)
    {
        $this->set('bio', $bio);
        return $this;
    }

    public function getEmail()
    {
        return $this->get('email');
    }

    public function setEmail($email)
    {
        $this->set('email', $email);
        return $this;
    }

    public function getFirstName()
    {
        return $this->get('first_name');
    }

    public function setFirstName($first_name)
    {
        $this->set('first_name', $first_name);
        return $this;
    }

    public function getIm()
    {
        return $this->get('im');
    }

    public function setIm($im)
    {
        $this->set('im', $im);
        return $this;
    }

    public function getLastName()
    {
        return $this->get('last_name');
    }

    public function setLastName($last_name)
    {
        $this->set('last_name', $last_name);
        return $this;
    }

    public function getPermissions()
    {
        return $this->get('permissions');
    }

    public function setPermissions($permissions)
    {
        $this->set('permissions', $permissions);
        return $this;
    }

    public function getPhone()
    {
        return $this->get('phone');
    }

    public function setPhone($phone)
    {
        $this->set('phone', $phone);
        return $this;
    }

    public function getPin()
    {
        return $this->get('pin');
    }

    public function setPin($pin)
    {
        $this->set('pin', $pin);
        return $this;
    }

    public function getReceiveAnnouncements()
    {
        return $this->get('receive_announcements');
    }

    public function setReceiveAnnouncements($receive_announcements)
    {
        $this->set('receive_announcements', $receive_announcements);
        return $this;
    }

    public function getScreenName()
    {
        return $this->get('screen_name');
    }

    public function setScreenName($screen_name)
    {
        $this->set('screen_name', $screen_name);
        return $this;
    }

    public function getUrl()
    {
        return $this->get('url');
    }

    public function setUrl($url)
    {
        $this->set('url', $url);
        return $this;
    }

    public function getUserType()
    {
        return $this->get('user_type');
    }

    public function setUserType($user_type)
    {
        $this->set('user_type', $user_type);
        return $this;
    }
}
