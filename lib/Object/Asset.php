<?php
/**
 *
 * Shopify\Object\Asset
 *
 * Assets are individual files that make up a shop's theme.
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
 * @link https://help.shopify.com/api/reference/asset
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;

class Asset extends AbstractObject
{
    use HasTimestamps;

    public static function getApiHandle()
    {
        return 'assets';
    }
    
    /**
     * An asset attached to a store's theme.
     * @var string
     */
    protected $attachment;

    /**
     * MIME representation of the content, consisting of the type and subtype of the asset.
     * @var string
     */
    protected $content_type;

    /**
     * The path to the asset within a shop. For example, the asset bg-body-green.gif is located in the assets folder.
     * @var string
     */
    protected $key;

    /**
     * The public facing URL of the asset.
     * @var string
     */
    protected $public_url;

    /**
     * The asset size in bytes.
     * @var integer
     */
    protected $size;

    /**
     * The source key copies an asset.
     * @var string
     */
    protected $source_key;

    /**
     * Specifies the location of an asset.
     * @var string
     */
    protected $src;

    /**
     * A unique numeric identifier for the theme.
     * @var integer
     */
    protected $theme_id;

    /**
     * The asset that you are adding.
     * @var string
     */
    protected $value;

    public function getAttachment()
    {
        return $this->get('attachment');
    }

    public function setAttachment($attachment)
    {
        $this->set('attachment', $attachment);
        return $this;
    }

    public function getContentType()
    {
        return $this->get('content_type');
    }

    public function setContentType($content_type)
    {
        $this->set('content_type', $content_type);
        return $this;
    }

    public function getKey()
    {
        return $this->get('key');
    }

    public function setKey($key)
    {
        $this->set('key', $key);
        return $this;
    }

    public function getPublicUrl()
    {
        return $this->get('public_url');
    }

    public function setPublicUrl($public_url)
    {
        $this->set('public_url', $public_url);
        return $this;
    }

    public function getSize()
    {
        return $this->get('size');
    }

    public function setSize($size)
    {
        $this->set('size', $size);
        return $this;
    }

    public function getSourceKey()
    {
        return $this->get('source_key');
    }

    public function setSourceKey($source_key)
    {
        $this->set('source_key', $source_key);
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

    public function getThemeId()
    {
        return $this->get('theme_id');
    }

    public function setThemeId($theme_id)
    {
        $this->set('theme_id', $theme_id);
        return $this;
    }

    public function getValue()
    {
        return $this->get('value');
    }

    public function setValue($value)
    {
        $this->set('value', $value);
        return $this;
    }
}
