<?php

namespace Quark\CSVHelper;

class ArrayAssociator
{
    /**
     * Data.
     * 
     * @var array
     */
    private $data = [];

    /**
     * Args.
     * 
     * @var array
     */
    private array $args;

    /**
     * Constructor.
     * 
     * @param array $array
     */
    public function __construct(array $data, $args)
    {
        foreach ($data as $dado) {
            $this->data[] = new ArrayAssociatorField($dado);
        }

        $this->args = $args;
    }

    /**
     * 
     */
    public function getData()
    {
    }
}