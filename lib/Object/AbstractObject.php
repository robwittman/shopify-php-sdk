<?php

namespace Shopify\Object;

abstract class AbstractObject
{
    public function __construct()
    {

    }

    /**
     * Set the field 'property' to 'value'.
     * @param string $property
     * @param mixed $value
     */
    public function set($property, $value)
    {
        if (!property_exists($this), $property) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Property %s does not exist for %s", $property, get_called_class()
                )
            );
        }

        $this->{$property} = $value;
    }

    public function get($property) {
        if (!property_exists($this), $property) {
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
        if (!in_array(substr($method, 0, 2), ['get', 'set'])) {
            throw new \Exception(
                sprintf("Call to undefined method %s::%s", get_called_class(), $method)
            );
        }
        $propertyName = $this->getPropertyName($method);
        $values = $arguments ? $arguments : null;
        if (substr($method, 0, 2) === 'get') {
            return $this->get($propertyName);
        } else {
            return $this->set($propertyName, $values);
        }
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
}
