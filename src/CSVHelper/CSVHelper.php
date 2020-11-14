<?php

namespace Quark\CSVHelper;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

final class CSVHelper
{
    /**
     *  Store filename.
     * 
     * @var string
     */
    private string $filename;

    /** @var string */
    private string $delimiter;

    /** @var string */
    public const FILENAME = '@FILENAME@';

    /** @var int */
    public const QUOTATION_MARK = 34;

    /**
     * Constructor.
     * 
     * @param string $filename
     * @param string $delimiter
     */
    public function __construct(
        string $filename,
        string $delimiter
    ) {
        $this->filename = $filename;
        $this->delimiter = $delimiter;
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
        return file_get_contents($this->filename);
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
        return array_filter(preg_split("/[{$this->delimiter}\n]/", $this->get()));
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
            count($this->CSVParser()) / count(file($this->filename))
        );
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
     * @return array $data
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
