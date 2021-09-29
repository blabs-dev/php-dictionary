# Quick Dictionary

A simple but powerful abstract class to manage quick dictionaries with php.

We've decided to write this package just to use it without much dependencies on some legacy projects that still runs on old versions of php.

It not aims to be a complete implementation of an `enum` class, it just let you add some constants to a class and being able to quick get all definition values as array or checking if a value is "valid". 

## Installation
```
composer require blabs-dev/dictionary
```

## Usage
The package let you choose if you prefer to extend an abstract class or use a trait to implement dictionary features in your class.

The first approach is useful for single responsibility classes such as a simple dictionary of strings, while the latter can be convenient if your class already has inheritance with other dependencies and you simply want to being able to check vailidity of a value against a list of the class constants.

### Using inheritance (extending abstract class)
```php

// create a class extending the Dictionary abstract

use Blabs\Dictionary\Dictionary;

class Fruits extends Dictionary
{
    const APPLE = 'apple';
    const BANANA = 'banana';
    const ORANGE = 'orange';
}


// return all "values" from the dictionary

Fruits::values() // outputs [ 'apple', 'banana', 'orange' ]


// check if a value is valid

Fruits::isValid('apple') // outputs `true`

Fruits::isValid('tomato') // outputs `false`
```

### Using composition (with trait)

```php

// include the trait in your existing class

use Blabs\Dictionary\WithDictionary;

class MyVegetablesService extends StockService
{
    use WithDictionary;  // declare that the class will use methods in the trait

    const AUBERGINE = 'aubergine';
    const SWEET_PEPPER = 'sweet pepper';
    const TOMATO = 'tomato';
    
    public function prepareForShipping($vegetable, $quantity)
    {
        // ....
        
        if (! self::isValid($vegetable))  // recall dictionary method isValid() to check a value
            throw new InvalidArgumentException('this is not a veggie!')
    }
    
    public function checkStockAvailability()
    {
        // ....
        
        foreach (self::values() as $vegetable)  // cycle all vegetables
        {
            $this->checkStocks($vegetable);
        }
    }
}


// return all "values" from the dictionary

Fruits::values() // outputs [ 'apple', 'banana', 'orange' ]


// check if a value is valid

Fruits::isValid('apple') // outputs `true`

Fruits::isValid('tomato') // outputs `false`
```

## Disclaimer
**PLEASE NOTE** This class will probably become useless when php 8.1 will be released including new `enums` feature. 
If you need a complete implementation of an enumerable class, you can rely on more robust and supported packages, like [myclabs/php-enum](https://github.com/myclabs/php-enum).
