<?php
/**
 *
 * Shopify\Object\Webhook
 *
 * Webhooks are a useful tool for apps that want to execute code after a specific
 * event happens on a shop, for example, after a customer creates a cart on the
 * storefront, or a merchant creates a new product in their admin.
 *
 * Instead of telling your app to make an API call every X number of minutes to check
 * if a specific event has occured on a shop, you can register webhooks, which
 * send an HTTP request from the shop telling your app that the event has occurred.
 * This uses many less API requests overall, allowing you to build more robust apps,
 * and update your app instantly after a webhook is received.
 *
 * Webhooks are scoped to the app they're registered to. This means that when a
 * webhook is registered to an app, other apps can't view, modify, or delete it.
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
 * @link https://help.shopify.com/api/reference/webhook
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Webhook extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * The URI where the webhook should send the POST request when the event occurs.
     * @var string
     */
    protected $address;

    /**
     * (Optional) An array of fields which should be included in webhooks.
     * @var array
     */
    protected $fields;

    /**
     * The format in which the webhook should send the data.
     * Valid values are json and xml.
     * @var string
     */
    protected $format;

    /**
     * (Optional) An array of namespaces for metafields that should be included in webhooks.
     * @var array
     */
    protected $metafield_namespaces;

    /**
     * The event that will trigger the webhook.
     * @var string
     */
    protected $topic;

    public function getAddress()
    {
        return $this->get('address');
    }

    public function setAddress($address)
    {
        $this->set('address', $address);
        return $this;
    }

    public function getFields()
    {
        return $this->get('fields');
    }

    public function setFields($fields)
    {
        $this->set('fields', $fields);
        return $this;
    }

    public function getFormat()
    {
        return $this->get('format');
    }

    public function setFormat($format)
    {
        $this->set('format', $format);
        return $this;
    }

    public function getMetafieldNamespaces()
    {
        return $this->get('metafield_namespaces');
    }

    public function setMetafieldNamespaces($metafield_namespaces)
    {
        $this->set('metafield_namespaces', $metafield_namespaces);
        return $this;
    }

    public function getTopic()
    {
        return $this->get('topic');
    }

    public function setTopic($topic)
    {
        $this->set('topic', $topic);
        return $this;
    }
}
