<?php

namespace Blabs\Dictionary;

use ReflectionClass;

trait WithDictionary
{

    /**
     * @return array
     */
    static function all()
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

    /**
     * @return array
     */
    static function values()
    {
        return array_values(self::all());
    }

    /**
     * @param string $value
     * @return bool
     */
    static function isValid($value)
    {
        return in_array($value, self::values());
    }
}