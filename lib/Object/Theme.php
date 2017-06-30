<?php
/**
 *
 * Shopify\Object\Theme
 *
 * A theme is the look and feel template for your Shopify shop.
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
 * @link https://help.shopify.com/api/reference/theme
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Theme extends AbstractObject
{
    use HasTimestamps,
        HasId;

    public static function getApiHandle()
    {
        return 'themes';
    }

    /**
     * The name of the theme.
     * @var string
     */
    protected $name;

    /**
     * Specifies how the theme is being used within the shop. Valid values are:
     *
     * main: the theme customers see when visiting the shop in a desktop browser.
     * unpublished: the theme that customers cannot currently see.
     * @var string
     */
    protected $role;

    /**
     * Indicates if the theme can currently be previewed.
     * @var boolean
     */
    protected $previewable;

    /**
     * Indicates if files are still being copied into place for this theme.
     * @var boolean
     */
    protected $processing;

    public function getName()
    {
        return $this->get('name');
    }

    public function setName($name)
    {
        $this->set('name', $name);
        return $this;
    }

    public function getRole()
    {
        return $this->get('role');
    }

    public function setRole($role)
    {
        $this->set('role', $role);
        return $this;
    }

    public function getPreviewable()
    {
        return $this->get('previewable');
    }

    public function setPreviewable($previewable)
    {
        $this->set('previewable', $previewable);
        return $this;
    }

    public function getProcessing()
    {
        return $this->get('processing');
    }

    public function setProcessing($processing)
    {
        $this->set('processing', $processing);
        return $this;
    }
}
