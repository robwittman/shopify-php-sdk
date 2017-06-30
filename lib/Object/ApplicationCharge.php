<?php
/**
*
* Shopify\Object\ApplicationCharge
*
* Request to charge a shop a one-time fee by issuing this call with the name
* the charge should appear under (on the shop owner’s invoice), the price your
* application is charging, and a  return_url to where Shopify will redirect the
* shop owner to after they have accepted or declined the charge.
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
*
* @package Shopify
* @author Rob Wittman <rob@ihsdigital.com>
* @license MIT
* @link https://help.shopify.com/api/reference/applicationcharge
*/

namespace Shopify\Object;

use Shopify\Concerns\HasId;
use Shopify\Concerns\HasTimestamps;

class ApplicationCharge extends AbstractObject
{
    use HasId,
        HasTimestamps;
        
    public static function getApiHandle()
    {
        return 'application_charges';
    }
    /**
     * The URL that the customer is taken to, to accept or decline the one-time application charge.
     * @var string
     */
    protected $confirmation_url;

    /**
     * The name of the one-time application charge.
     * @var string
     */
    protected $name;

    /**
     * The price of the one-time application charge.
     * @var float
     */
    protected $price;

    /**
     * The URL the customer is sent to once they accept/decline a charge.
     * @var string
     */
    protected $return_url;

    /**
     * The status of the application charge
     * @var string
     */
    protected $status;

    /**
     * States whether or not the application charge is a test transaction. Valid values are "true" or "null".
     * @var string
     */
    protected $test;

    public function getConfirmationUrl()
    {
        return $this->get('confirmation_url');
    }

    public function setConfirmationUrl($confirmation_url)
    {
        $this->set('confirmation_url', $confirmation_url);
        return $this;
    }

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
        return $this;
    }

    public function getPrice()
    {
        return $this->get('price');
    }

    public function setPrice($price)
    {
        $this->set('price', $price);
        return $this;
    }

    public function getReturnUrl()
    {
        return $this->get('return_url');
    }

    public function setReturnUrl($return_url)
    {
        $this->set('return_url', $return_url);
        return $this;
    }

    public function getStatus()
    {
        return $this->get('status');
    }

    public function setStatus($status)
    {
        $this->set('status', $status);
        return $this;
    }

    public function getTest()
    {
        return $this->get('test');
    }

    public function setTest($test)
    {
        $this->set('test', $test);
        return $this;
    }
}
