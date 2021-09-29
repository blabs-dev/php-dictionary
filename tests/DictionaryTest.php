<?php

namespace Blabs\Dictionary\Tests;

use PHPUnit\Framework\TestCase;

class DictionaryTest extends TestCase
{
    private $fruitsTestingDictionary;

    protected function setUp()
    {
        parent::setUp();
        $this->fruitsTestingDictionary = new FruitsTestingDictionary();
    }

    /**
     * @test
     */
    public function it_lists_all_values()
    {
        $this->assertEquals([
            'apple',
            'banana',
            'orange',
        ], $this->fruitsTestingDictionary->values());
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_valid()
    {
        $this->assertTrue($this->fruitsTestingDictionary->isValid('apple'));
    }

    /**
     * @test
     */
    public function it_can_checks_if_a_value_is_not_valid()
    {
        $this->assertFalse($this->fruitsTestingDictionary->isValid('tomato'));
    }
}