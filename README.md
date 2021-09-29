# Quick Dictionary

A simple but powerful abstract class to manage quick dictionaries with php.

We've decided to write this package just to use it without much dependencies on some legacy projects that still runs on old versions of php.

It not aims to be a complete implementation of an `enum` class, it just let you add some constants to a class and being able to quick get all definition values as array or checking if a value is "valid". 

## Installation
```
composer require blabs-dev/dictionary
```

## Usage
```php
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

## Disclaimer
**PLEASE NOTE** This class will probably become useless when php 8.1 will be released including new `enums` feature. 
If you need a complete implementation of an enumerable class, you can rely on more robust and supported packages, like [myclabs/php-enum](https://github.com/myclabs/php-enum).
