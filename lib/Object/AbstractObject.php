<?php
/**
 *
 * Shopify\Object\AbstractObject
 *
 * Base class which all Shopify objects extend from
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
 */

namespace Shopify\Object;

use Shopify\Exception\ShopifySdkException;
use ReflectionClass;

abstract class AbstractObject
{
    public static function getApiHandle()
    {
        return false;
    }

    private $changedFields = array();

    /**
     * Set the field 'property' to 'value'.
     * @param string $property
     * @param mixed $value
     */
    public function set($property, $value)
    {
        if (!property_exists($this, $property)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Property %s does not exist for %s", $property, get_called_class()
                )
            );
        }
        $type = $this->getPropertyType($property);
        $value = $this->cast($type, $value);
        $this->{$property} = $value;
        $this->changedFields[$property] = $value;
        return $this;
    }

    public function get($property) {
        if (!property_exists($this, $property)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Property %s does not exist for %s", $property, get_called_class()
                )
            );
        }

        return $this->{$property};
    }

    public function __call($method, $arguments)
    {
        if (!in_array(substr($method, 0, 3), ['get', 'set'])) {
            throw new \Exception(
                sprintf("Call to undefined method %s::%s", get_called_class(), $method)
            );
        }
        $propertyName = $this->getPropertyName(substr($method, 3));
        $values = $arguments ? $arguments : null;
        if (substr($method, 0, 3) === 'get') {
            return $this->get($propertyName);
        } else {
            return $this->set($propertyName, $values);
        }
    }

    public function setDataWithoutValidation($data)
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
        $this->clearHistory();
    }

    public function clearHistory()
    {
        $this->changedFields = array();
    }

    public function setData($data)
    {
        foreach ($data as $key => $value) {
            $this->set($key, $value);
        }
    }

    public function exportData()
    {
        $results = array();
        foreach ($this->changedFields as $field => $value) {
            if (is_a($value, self::class)) {
                $value = $value->exportData();
            }
            $results[$field] = $value;
        }
        return $results;
    }

    public function getPropertyName($function)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $function));
    }

    public function getSetter($propertyName)
    {
        return 'set'.$this->toPascalCase($propertyName);
    }

    public function getGetter($propertyName)
    {
        return 'get'.$this->toPascalCase($propertyName);
    }

    public function toPascalCase($propertyName)
    {
        return str_replace('_','',ucwords($propertyName, '_'));
    }

    public function getPropertyType($propertyName)
    {
        $class = new ReflectionClass(static::class);
        $property = $class->getProperty($propertyName);
        if (preg_match('/@var\s+([^\s]+)/', $property->getDocComment(), $matches)) {
            list(, $type) = $matches;
            return $type;
        }
        return null;
    }

    public function cast($type, $value)
    {
        $list = false;
        if (is_null($type) || is_null($value)) {
            return null;
        }
        if (substr($type, -2) == '[]') {
            $type = substr($type, 0, -2);
            $list = true;
        }
        if (class_exists($type) && is_subclass_of(self::class, $type)) {
            if ($list) {
                $value = array_map(function($data) use ($type) {
                    return $this->instantiate($type, $data);
                }, $value);
            } else {
                $value = $this->instantiate($type, $value);
            }
        }
        return $value;
    }

    public function instantiate($className, $data)
    {
        if (class_exists($className)) {
            $obj = new $className();
            $obj->setDataWithoutValidation($data);
            return $obj;
        }
        return $data;
    }
}
