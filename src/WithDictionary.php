<?php

namespace Blabs\Dictionary;

use ReflectionClass;

trait WithDictionary
{

    /**
     * @return array
     */
    static function all(): array
    {
        $reflectionClass = new ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }

    /**
     * @return array
     */
    static function values(): array
    {
        return array_values(self::all());
    }

    /**
     * @param mixed $value
     * @return bool
     */
    static function isValid($value): bool
    {
        return in_array($value, self::values());
    }
}