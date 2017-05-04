<?php
/**
 *
 * Shopify\Object\Redirect
 *
 * A redirect causes a visitor on a specific path on the shop's site to be automatically
 * sent to a target (different location). The target can be a new location on the shop's
 * site, or a full URL, even one on a completely different domain. Redirect paths are unique;
 * a shop cannot have more than one redirect with the same path.
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
 * @link https://help.shopify.com/api/reference/redirect
 */

namespace Shopify\Object;

use Shopify\Concerns\HasId;

class Redirect extends AbstractObject
{
    use HasId;

    /**
     * The "before" path to be redirected. When the user this path, s/he will be
     * redirected to the path specified by target.
     * @var string
     */
    protected $path;

    /**
     * The "after" path or URL to be redirected to. When the user visits the path
     * specified by path, s/he will be redirected to this path or URL. This property
     * can be set to any path on the shop's site, or any URL, even one on a completely
     * different domain.
     * @var string
     */
    protected $target;

    public function getPath()
    {
        return $this->get('path');
    }

    public function setPath($path)
    {
        $this->set('path', $path);
        return $this;
    }

    public function getTarget()
    {
        return $this->get('target');
    }

    public function setTarget($target)
    {
        $this->set('target', $target);
        return $this;
    }
}
