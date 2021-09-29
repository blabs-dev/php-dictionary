<?php

namespace Blabs\Dictionary\Tests\Classes;

use Blabs\Dictionary\WithDictionary;

class CompositionTestClass
{
    use WithDictionary;

    const AUBERGINE = 'aubergine';
    const SWEET_PEPPER = 'sweet pepper';
    const TOMATO = 'tomato';

    // Checks if a product is a "legit" vegetable :)
    public function isVegetable($product)
    {
        // recalls dictionary trait method to check if the dictionary has specified product
        return self::isValid($product);
    }

    // Lists all available vegetables
    public function getVegetables()
    {
        // recalls dictionary static method to list all vegetable products
        return self::values();
    }
}