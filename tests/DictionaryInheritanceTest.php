<?php

namespace Blabs\Dictionary\Tests;

use Blabs\Dictionary\Tests\Classes\InheritanceTestClass;
use PHPUnit\Framework\TestCase;

class DictionaryInheritanceTest extends TestCase
{
    private $fruits;

    protected function setUp()
    {
        parent::setUp();
        $this->fruits = new InheritanceTestClass();
    }

    /**
     * @test
     */
    public function it_lists_all_values_using_inheritance()
    {
        $this->assertEquals([
            'apple',
            'banana',
            'orange',
        ], $this->fruits->values());
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_valid_using_inheritance()
    {
        $this->assertTrue($this->fruits->isValid('apple'));
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_not_valid_using_inheritance()
    {
        $this->assertFalse($this->fruits->isValid('tomato'));
    }
}