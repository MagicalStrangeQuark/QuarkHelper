<?php

namespace Quark;

error_reporting(E_STRICT);

class TextHelper
{
    /**
     * Create.
     * 
     * @param void
     * 
     * @return Self
     */
    public function create(): Self
    {
        return new Self();
    }

    /**
     * Print.
     * 
     * @param string $str
     * 
     * @return string
     */
    public function print(string $str): string
    {
        return $str;
    }
}
