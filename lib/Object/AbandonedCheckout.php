<?php
/**
 * Shopify\Object\AbandonedCheckout
 *
 * This is used to return abandoned checkouts. A checkout is considered
 * abandoned when a customer has entered their billing & shipping info,
 * but has yet to complete the purchase.
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
 * @author  Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 * @link    https://help.shopify.com/api/reference/abandoned_checkouts
 */

namespace Shopify\Object;

use Shopify\Enum\Fields\AbandonedCheckoutFields;

class AbandonedCheckout extends AbstractObject
{
    public static function getFieldsEnum()
    {
        return AbandonedCheckoutFields::getInstance();
    }
}
