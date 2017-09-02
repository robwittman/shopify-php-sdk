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

class Webhook extends AbstractObject { }
