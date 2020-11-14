<?php

namespace Quark\CSVHelper;

final class Row
{
    /**
     * Data.
     * 
     * @var string
     */
    private string $data;

    /**
     * Delimiter.
     * 
     * @var string
     */
    private string $delimiter;

    /**
     * Constructor.
     * 
     * @param void
     */
    public function __construct(
        string $data,
        string $delimiter
    ) {
        $this->data = $data;
        $this->delimiter = $delimiter;
    }

    /**
     * Delimiter.
     * 
     * @param void
     * 
     * @return string
     */
    public function delimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * Quantity.
     * 
     * @param void
     * 
     * @return int
     */
    public function quantity(): int
    {
        return count(explode($this->delimiter, $this->data));
    }
}
