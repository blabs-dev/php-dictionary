<?php

namespace Blabs\Dictionary\Tests;

use Blabs\Dictionary\Tests\Classes\CompositionTestClass;
use PHPUnit\Framework\TestCase;

class DictionaryCompositionTest extends TestCase
{
    private $vegetables;

    protected function setUp()
    {
        parent::setUp();
        $this->vegetables = new CompositionTestClass();
    }

    /**
     * @test
     */
    public function it_lists_all_values_using_composition()
    {
        $this->assertEquals([
            'aubergine',
            'sweet pepper',
            'tomato',
        ], $this->vegetables->getVegetables());
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_valid_using_composition()
    {
        $this->assertTrue($this->vegetables->isVegetable('aubergine'));
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_not_valid_using_composition()
    {
        $this->assertFalse($this->vegetables->isVegetable('apple'));
    }

    /**
     * @test
     */
    public function dictionary_static_methods_can_be_used_with_composition()
    {
        $this->assertFalse(CompositionTestClass::isValid('apple'));
        $this->assertTrue(CompositionTestClass::isValid('aubergine'));
        $this->assertCount(3, CompositionTestClass::values());
    }
}