<?php
/**
 *
 * Shopify\Object\Metafield
 *
 * Metafields allow you to attach metadata, which is additional information, to a store's resources.
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
 * @link https://help.shopify.com/api/reference/metafield
 */

namespace Shopify\Object;

use Shopify\Concerns\HasTimestamps;
use Shopify\Concerns\HasId;

class Metafield extends AbstractObject
{
    use HasTimestamps,
        HasId;

    /**
     * Additional information about the metafield. This property is optional.
     * @var string
     */
    protected $description;

    /**
     * Identifier for the metafield (maximum of 30 characters).
     * @var string
     */
    protected $key;

    /**
     * Container for a set of metafields. You need to define a custom namespace
     * for your metafields to distinguish them from metafields used by other apps
     * (maximum of 20 characters).
     * @var string
     */
    protected $namespace;

    /**
     * The unique ID of the resource that the metafield is attached to.
     * @var integer
     */
    protected $owner_id;

    /**
     * The type of resource that the metafield is attached to.
     * @var string
     */
    protected $owner_resource;

    /**
     * Information to be stored as metadata.
     * @var mixed
     */
    protected $value;

    /**
     * States whether the information in the value is stored as a 'string' or 'integer.'
     * @var string
     */
    protected $value_type;

    public function getDescription()
    {
        return $this->get('description');
    }

    public function setDescription($description)
    {
        $this->set('description', $description);
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

    public function getNamespace()
    {
        return $this->get('namespace');
    }

    public function setNamespace($namespace)
    {
        $this->set('namespace', $namespace);
        return $this;
    }

    public function getOwnerId()
    {
        return $this->get('owner_id');
    }

    public function setOwnerId($owner_id)
    {
        $this->set('owner_id', $owner_id);
        return $this;
    }

    public function getOwnerResource()
    {
        return $this->get('owner_resource');
    }

    public function setOwnerResource($owner_resource)
    {
        $this->set('owner_resource', $owner_resource);
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

    public function getValueType()
    {
        return $this->get('value_type');
    }

    public function setValueType($value_type)
    {
        $this->set('value_type', $value_type);
        return $this;
    }
}
