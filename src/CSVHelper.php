<?php

namespace Quark;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

final class CSVHelper
{
    /** @var string */
    private string $FILENAME;

    /** @var string */
    private string $DELIMITER;

    /** @var string */
    public const FILENAME = '@FILENAME@';

    /** @var int */
    public const QUOTATION_MARK = 34;

    /**
     * Constructor.
     * 
     * @param string $str
     */
    public function __construct(
        string $str
    ) {
        $this->DELIMITER = $str;
    }

    /**
     * Get.
     * 
     * @param void
     * 
     * @return string
     */
    public function get(): string
    {
        return file_get_contents($this->FILENAME);
    }

    /**
     * CSVParser.
     * 
     * Explode each column of CSV in a unidimensional array.
     * 
     * @param void
     * 
     * @return array
     */
    public function CSVParser(): array
    {
        return array_filter(preg_split("/[{$this->DELIMITER}\n]/", $this->get()));
    }

    /**
     * Data.
     * 
     * @param void
     * 
     * @return array
     */
    private function data(): array
    {
        return array_chunk(
            array_map(fn (string $str) => $this->trimAll($str), $this->CSVParser()),
            count($this->CSVParser()) / count(file($this->FILENAME))
        );
    }

    /**
     * Set.
     * 
     * @param string $str
     * @param string $arg
     * 
     * @return Self
     */
    public function __set(
        string $str,
        string $arg
    ): Self {
        switch ($str) {
            case self::FILENAME:
                $this->FILENAME = $arg;
                break;
        }

        return $this;
    }

    /**
     * trimAll.
     * 
     * @param string $str
     * 
     * @return string
     */
    private function trimAll(
        string $str
    ): string {
        return str_replace(chr(static::QUOTATION_MARK), NULL, trim(preg_replace('/\t+/', NULL, $str)));
    }

    /**
     * Objectify.
     * 
     * @param void
     * 
     * @return \stdClass
     */
    public function Objectify(): \stdClass
    {
        return (new \Quark\StringHelper)->arr2obj(
            $this->SQLfy($this->data())
        );
    }

    /**
     * SQLfy.
     * 
     * @param array $arr
     * 
     * @return array
     */
    private function SQLfy(
        array $arr
    ): array {
        $data = [];

        for ($i = 0; $i < count($arr); $i++) {
            foreach ($arr[$i] as $key => $array) {
                $data[$i][$arr[0][$key]] = $arr[$i][$key];
            }
        }

        return $data;
    }
}
