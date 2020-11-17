<?php

namespace Quark\CSVHelper;

interface FieldValidator
{
    /**
     * Err.
     * 
     * @param void
     * 
     * @return string
     */
    public function err(): string;

    /**
     * hasErrors.
     * 
     * @param void
     * 
     * @return bool
     */
    public function hasErrors(): bool;

    /**
     * Data.
     * 
     * @param void
     * 
     * @return string
     */
    public function data(): string;
}