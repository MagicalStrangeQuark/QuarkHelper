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

    /**
     * Check if an $needle is subarray of $arr.
     * 
     * @param array $needle
     * @param array $arr
     * 
     * @return bool
     */
    public static function ArrayContains(
        array $needle,
        array $arr
    ): bool {
        $c = 0;

        foreach ($needle as $array) {
            $c += (int) in_array($array, $arr) ? 1 : 0;
        }

        return (int) $c === (int) count($needle) ? true : false;
    }

    /**
     * Method used to return an array of colors in hexadecimal format.
     * 
     * @param int $n
     * 
     * @return array
     */
    public static function getArrayOfHexColors(
        int $n = 0
    ): array {
        if (
            $n <= 0
        ) {
            throw new \InvalidArgumentException("The method getArrayOfHexColors expect receive an positive and not null parameter. :{$n} received.");
        }

        return array_map(function () {
            return (new \Quark\StringHelper())->getHEXRandomColor();
        }, array_fill(NULL, $n, NULL));
    }
}
