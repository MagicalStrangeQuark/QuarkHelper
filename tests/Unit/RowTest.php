<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class RowTest extends TestCase
{
    /**
     * Delimiter.
     * 
     * @var array
     */
    private array $delimiter = [";", ".", "|", "#", "@", "$", "!", "(", ")"];

    /**
     * Test setting and getting string delimiter.
     * 
     * @param void
     */
    public function testCanSetDelimiter()
    {
        foreach ($this->delimiter as $delimiter) {
            $this->assertEquals((new \Quark\CSVHelper\Row("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sed odio tellus.", $delimiter))->delimiter(), $delimiter);
        }
    }

    /**
     * Test for obtaining a random color in hexadecimal format.
     * 
     * @param void
     */
    public function testCanGetColumnsNumberCorrectly()
    {
        foreach ($this->delimiter as $delimiter) {
            $this->assertEquals((new \Quark\CSVHelper\Row(sprintf("A%s B%s C%s E%s E%s F%s G", ...array_fill(0, 7,  $delimiter)),  $delimiter))->quantity(), 7);
        }
    }
}
