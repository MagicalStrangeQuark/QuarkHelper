<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    /**
     * Test for obtaining a random color in hexadecimal format.
     * 
     * @param void
     */
    public function testgetHEXRandomColor()
    {
        $this->assertTrue((bool)(preg_match((new \Quark\StringHelper())::STRICT_HEXADECIMAL_COLOR_REGEX, (new \Quark\StringHelper())->getHEXRandomColor())));
    }
}
