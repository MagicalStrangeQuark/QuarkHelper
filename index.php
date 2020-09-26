<?php

require_once "./vendor/autoload.php";

use \Quark\CSVHelper;

$data = (new CSVHelper(';'))->__set(CSVHelper::FILENAME, 'tests/CSV.CSV')->Objectify();

echo "<pre>";
var_dump($data);
echo "</pre>";
