# Quick Dictionary implementation for your classes

A simple but powerful package to manage quick "dictionaries" of primitive values with php.

The concept of "dictionary" refers to a simple list of valid values for a specific domain.
The package let you define dictionaries using php constants and quickly access to their values outside the class context.

It not aims to be an implementation of an __enumerable class__, it just let you being able to quick get all constants values of your class as an array, or checking if a value is in the dictionary and thus can be considered as "valid". 

## Installation
```
composer require blabs-dev/dictionary
```

## Usage
The package let you choose if you prefer to extend an abstract class or use a trait to implement dictionary features in your class.

The first approach is useful for single responsibility classes such as a simple class for a dictionary of strings, while the latter can be convenient if your class already has inheritance with other dependencies and you simply want to being able to check vailidity of a value against a list of the class constants.

### Sample usage with inheritance
Here's an example of a dictionary of fruits that extends dictionary abstract.
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

### Sample usage with composition
Here's an example of a hypothetical vegetables warehouse that already extends another class called `StockService` to check product's availability, in this case you can include `WithDictionary` trait to add dictionary features

```php
use Blabs\Dictionary\WithDictionary; 

class MyVegetablesWarehouse extends StockService
{
    use WithDictionary;  // include the trait in your class to use dictionary features

    // Defines all products handled by the warehouse 
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
    
    // Get stocks for a specific vegetable
    public function getVegetablesStocks($vegetable)
    {
        // uses dictionary static method to check if the product is "valid" before doing anything else
        if (! self::isValid($vegetable))   
            throw new InvalidArgumentException('this is not a veggie!')
            
        // then recalls a hypothetical method from elsewhere (i.e. the StockService class)
        return $this->getStocks($vegetable); 
    }
    
    // Creates an "inventory" array
    public function getVegetablesInventory()
    {        
        $stocks = [];
        
        foreach (self::values() as $vegetable)  // cycle all vegetables in the dictionary
        {
            $stocks[$vegetable] = $this->getStocks($vegetable);
        }
        
        return $stocks;
    }
}


// the class will still expose static methods outside its context

MyVegetablesWarehouse::values() // outputs [ 'aubergine', 'sweet pepper', 'tomato' ]


// check if a value is valid

MyVegetablesWarehouse::isValid('apple') // outputs `false`

MyVegetablesWarehouse::isValid('tomato') // outputs `true`
```

## TODO
* Filtering
* Sorting
* Mapping

## Disclaimer
**PLEASE NOTE** This class will probably become useless when php 8.1 will be released within new `enums` API. 
If you need a complete implementation of an enumerable class, you can rely on more robust and supported packages, like [myclabs/php-enum](https://github.com/myclabs/php-enum).
