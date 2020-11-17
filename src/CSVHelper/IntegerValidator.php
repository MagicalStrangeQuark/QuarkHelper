<?php

namespace Quark\CSVHelper;

class IntegerValidator implements FieldValidator
{
    /** @var string */
    private bool $err = false;

    /** @var string */
    private string $data;

    /** @var string */
    private const ERR = "O argumento deve ser inteiro";

    /**
     * Err.
     * 
     * @param void
     * 
     * @return string
     */
    public function err(): string
    {
        return self::ERR;
    }

    /**
     * hasErrors.
     * 
     * @param void
     * 
     * @return bool
     */
    public function hasErrors(): bool
    {
        return $this->err;
    }

    /**
     * Data.
     * 
     * @param void
     * 
     * @return string
     */
    public function data(): string
    {
        return $this->data;
    }
}