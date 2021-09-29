<?php

namespace Blabs\Dictionary\Tests;

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
        ], $this->vegetables->values());
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_valid_using_composition()
    {
        $this->assertTrue($this->vegetables->isValid('aubergine'));
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_not_valid_using_composition()
    {
        $this->assertFalse($this->vegetables->isValid('apple'));
    }
}