<?php

namespace Quark;

error_reporting(E_STRICT);

class ArrayHelper
{
    /**
     * Returns the input CamelCasedString as an underscored_string.
     * 
     * @param string $str
     * 
     * @return string
     */
    public static function underscore(
        string $str
    ): string {
        return mb_strtolower(preg_replace('/(?<=\\w)([A-Z])/', "_" . '\\1', $str));
    }
}
