<?php
/**
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
 * @author  Rob Wittman <rob@ihsdigital.com>
 * @license MIT
 */

namespace Shopify\Object;

use Shopify\Exception\ShopifySdkException;
use Shopify\Enum\Fields\AbstractObjectEnum;

abstract class AbstractObject implements \JsonSerializable
{
    private $changedFields = array();

    protected $data = array();

    protected $types = array();

    public function __construct()
    {
        $enum = static::getFieldsEnum();
        $this->types = $enum->getFieldTypes();
        $this->data = array_fill_keys($enum->getFields(), null);
    }

    public function __get($key)
    {
        if (!array_key_exists($key, $this->data)) {
            throw new \InvalidArgumentException(
                "Property '{$key}' does not exist for ".get_called_class()
            );
        }
        return $this->data[$key];
    }

    public function __set($key, $value)
    {
        if (!array_key_exists($key, $this->data)) {
            return $this;
        }
        if (is_null($value) || is_bool($value)) {
            $this->data[$key] = $value;
            $this->changedFields[$key] = $value;
            return $this;
        }
        if (!is_null($value) && !$this->isValidValue($key, $value)) {
            throw new \InvalidArgumentException(
                "Invalid type for property '{$key}'"
            );
        }
        $this->data[$key] = $value;
        $this->changedFields[$key] = $value;
        return $this;
    }

    public function setDataWithoutValidation($data)
    {
        foreach ($data as $key => $value) {

        }
        $this->clearHistory();
    }

    public function clearHistory()
    {
        $this->changedFields = array();
    }

    public function setData($data)
    {
        $this->changedFields = array();
        if (!is_array($data) && !is_object($data)) {
            return null;
        }
        foreach ($data as $key => $value) {
            if (!array_key_exists($key, $this->data)) {
                continue;
            }
            $type = $this->types[$key];
            $value = $this->castToType($value, $type);
            $this->{$key} = $value;
        }
    }

    public function castToType($value, $type)
    {
        if (is_null($value)) {
            return null;
        }
        if ($type == 'string') {
            return (string) $value;
        } elseif ($type == 'integer') {
            return (integer) $value;
        } elseif ($type == 'boolean') {
            return (boolean) $value;
        } elseif ($type == 'array') {
            if (is_object($value)) {
                $value = (array) $value;
            }
            return $value;
        } elseif ($type == 'object') {
            if (is_array($value)) {
                $value = (object) $value;
            }
            return $value;
        } elseif ($type == 'float') {
            if (!is_float($value)) {
                $value = (float) $value;
            }
            return $value;
        } elseif ($type == 'DateTime') {
            if (!is_a($value, \DateTime::class)) {
                $value = new \DateTime($value);
            }
            return $value;
        } else {
            if (substr($type, -2) == '[]') {
                return array_map(
                    function ($data) use ($type) {
                        $className = '\\Shopify\\Object\\'.str_replace('[]', '', $type);
                        $obj = new $className();
                        $obj->setData($data);
                        return $obj;
                    }, $value
                );
            } else {
                $className = '\\Shopify\\Object\\'.$type;
                $obj = new $className();
                $obj->setData($value);
                return $obj;
            }
        }
    }

    public function isValidValue($key, $value)
    {
        $type = $this->types[$key];
        switch ($type) {
        case 'string':
            return is_string($value) || is_integer($value) || is_bool($value);
        case 'integer':
            return is_numeric($value);
        case 'boolean':
            return is_bool($value);
        case 'array':
            return is_array($value);
        case 'object':
            return is_object($value);
        case 'float':
            return is_float($value);
        case 'DateTime':
            return is_a($value, \DateTime::class);
        }
        if (substr($type, -2) == '[]') {
            foreach ($value as $obj) {
                if (!is_a($obj, '\\Shopify\\Object\\'.str_replace('[]', '', $type))) {
                    return false;
                }
            }
            return true;
        } else {
            return is_a($value, '\\Shopify\\Object\\'.$type);
        }
    }

    public function exportData()
    {
        $results = array();
        foreach ($this->changedFields as $field => $value) {
            $type = $this->types[$field];
            if (substr($type, -2) == '[]') {
                $results[$field] = array_map(
                    function ($obj) {
                        return $obj->exportData();
                    }, $value
                );
            } elseif (is_a($value, AbstractObject::class)) {
                $value = $value->exportData();
            } else {
                $results[$field] = $value;
            }
        }
        return $results;
    }

    public function getPropertyName($function)
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $function));
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
                $value = array_map(
                    function ($data) use ($type) {
                        return $this->instantiate($type, $data);
                    }, $value
                );
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

    public function getType($property)
    {
        if (array_key_exists($property, $this->types)) {
            return $this->types[$param];
        }
        return null;
    }

    public static function getFieldsEnum()
    {
        return AbstractObjectEnum::getInstance();
    }

    public function jsonSerialize()
    {
        return $this->data;
    }
}
