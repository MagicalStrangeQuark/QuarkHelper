<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CSVTest extends TestCase
{
    private const FILENAME = 'CSV.CSV';

    /**
     * Test for obtaining a random color in hexadecimal format.
     * 
     * @param void
     */
    public function testCanConvertCSVToStdClass()
    {
        $data = (new \Quark\CSVHelper(';'))->__set(\Quark\CSVHelper::FILENAME, dirname(__DIR__) . DIRECTORY_SEPARATOR . static::FILENAME)->Objectify();

        $this->assertEquals(count((array)$data), 3);

        $this->assertEquals($data->{0}->id, 'id');
        $this->assertEquals($data->{0}->code, 'code');
        $this->assertEquals($data->{0}->name, 'name');
        $this->assertEquals($data->{0}->country, 'country');
    }
}
