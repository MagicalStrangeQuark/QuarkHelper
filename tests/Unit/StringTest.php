<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    /** @var string */
    private const STRICT_HEXADECIMAL_COLOR_REGEX = '/^#[\d\w+]{6}$/';

    /**
     * Test for obtaining a random color in hexadecimal format.
     * 
     * @param void
     */
    public function testgetHEXRandomColor()
    {
        $this->assertTrue((bool)(preg_match(self::STRICT_HEXADECIMAL_COLOR_REGEX, (new \Quark\StringHelper())->getHEXRandomColor())));
    }
}
