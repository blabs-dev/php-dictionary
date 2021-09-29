<?php

namespace Blabs\Dictionary;

use ReflectionClass;

abstract class Dictionary
{
    /**
     * @param string $value
     * @return bool
     */
    static function isValid($value)
    {
        return in_array($value, self::values());
    }

    /**
     * @return array
     */
    static function values()
    {
        return array_values(self::all());
    }

    /**
     * @return array
     */
    static function all()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }
}
