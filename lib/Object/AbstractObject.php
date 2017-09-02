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

abstract class AbstractObject
{
    private $changedFields = array();

    protected $data = array();

    public function __get($key)
    {
        if (!array_key_exists($this->data, $key)) {
            throw new InvalidPropertyException(
                "Property '{$key}' does not exist for ".get_called_class()
            );
        }
        return $this->data[$key];
    }

    public function __set($key, $value)
    {
        $this->data[$key] = $value;
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

    public static function className()
    {
        return get_called_class();
    }
}
