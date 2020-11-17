<?php

/** @var array */
$args = [
    "id" => [
        "type" => "key"
    ],
    "name" => [
        "limit" => 50
    ],
    "address" => [
        "limit" => 50
    ]
];

/** @var array */
$data = [
    ["codigo", "id"],
    ["nome" => "name"],
    ["endereco" => "address"]
];

$arr = new ArrayAssociator($data, $args);