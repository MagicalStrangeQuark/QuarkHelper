<?php

namespace Quark;

error_reporting(E_STRICT);

class StringHelper
{
    /**
     * Method used to return a random color in hex format.
     *
     * @param void
     * 
     * @return string
     */
    public static function getHEXRandomColor(): string
    {
        return sprintf('#%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255));
    }
}
