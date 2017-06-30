<?php
/**
 *
 * Shopify\Object\ScriptTag
 *
 * The ScriptTag resource represents remote javascripts which are loaded into the
 * pages of a shop's storefront and in the order status page of checkout. This
 * makes it easy to add functionality to those pages without touching any theme
 * templates.
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
 * @link https://help.shopify.com/api/reference/scripttag
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class ScriptTag extends AbstractObject
{
    use HasTimestamps,
        HasId;

    public static function getApiHandle()
    {
        return 'script_tags';
    }

    /**
     * DOM event which triggers the loading of the script. Valid values are: "onload."
     * @var string
     */
    protected $event;

    /**
     * Specifies the location of the ScriptTag.
     * @var string
     */
    protected $src;

    /**
     * Specifies where the file should be included. "online_store" means only web
     * storefront, "order_status" means only the order status page, while "all" means both.
     * @var string
     */
    protected $display_scope;

    public function getEvent()
    {
        return $this->get('event');
    }

    public function setEvent($event)
    {
        $this->set('event', $event);
        return $this;
    }

    public function getSrc()
    {
        return $this->get('src');
    }

    public function setSrc($src)
    {
        $this->set('src', $src);
        return $this;
    }

    public function getDisplayScope()
    {
        return $this->get('display_scope');
    }

    public function setDisplayScope($display_scope)
    {
        $this->set('display_scope', $display_scope);
        return $this;
    }
}
