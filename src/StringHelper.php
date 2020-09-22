<?php

namespace Quark;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_STRICT);

class StringHelper
{
    /** @var string */
    public const STRICT_HEXADECIMAL_COLOR_REGEX = '/^#[\d\w+]{6}$/';

    /**
     * Method used to return a random color in hex format.
     *
     * @param void
     * 
     * @return string
     */
    public function getHEXRandomColor(): string
    {
        return sprintf('#%02x%02x%02x', rand(0, 255), rand(0, 255), rand(0, 255));
    }

    /**
     * Converts an array in \stdClass.
     * 
     * @param array $arr
     * 
     * @return \stdClass
     */
    public function arr2obj(
        array $arr
    ): \stdClass {
        return json_decode(json_encode($arr, JSON_FORCE_OBJECT));
    }
}
