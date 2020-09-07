<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    /** @var string */
    private const STRICT_HEXADECIMAL_COLOR_REGEX = '/^#[\d\w+]{6}$/';

    /**
     * Underscore Test.
     * 
     * @return void
     */
    public function testUnderscore()
    {
        $this->assertEquals((new \Quark\ArrayHelper())->underscore('bar'), 'bar');
        $this->assertEquals((new \Quark\ArrayHelper())->underscore('Color'), 'color');
        $this->assertEquals((new \Quark\ArrayHelper())->underscore('PaymentMethod'), 'payment_method');
        $this->assertEquals((new \Quark\ArrayHelper())->underscore('FooBarGoo'), 'foo_bar_goo');
    }

    /**
     * Test for obtaining an array of random colors in hexadecimal format.
     * 
     * @param void
     */
    public function testgetArrayOfHexColors()
    {
        $n = rand(2, 128);

        $data = (new \Quark\ArrayHelper())->getArrayOfHexColors($n);

        $this->assertCount($n, $data);

        foreach ($data as $data) {
            $this->assertTrue((bool)(preg_match(self::STRICT_HEXADECIMAL_COLOR_REGEX, $data)));
        }
    }

    /**
     * Test case where the method getArrayOfHexColors receive an negative value as argument.
     * 
     * @param void
     */
    public function testgetArrayOfHexColorsWithNegativeArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new \Quark\ArrayHelper())->getArrayOfHexColors(-1);
    }

    /**
     * Test case where the method getArrayOfHexColors receive an null value as argument.
     * 
     * @param void
     */
    public function testgetArrayOfHexColorsWithZeroasArgument()
    {
        $this->expectException(\InvalidArgumentException::class);

        (new \Quark\ArrayHelper())->getArrayOfHexColors(0);
    }
}
