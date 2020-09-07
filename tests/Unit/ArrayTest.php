<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
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
}
