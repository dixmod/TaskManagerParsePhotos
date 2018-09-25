<?php

return [
    'tmp' => [
        'dir' => getcwd() . DIRECTORY_SEPARATOR . 'tmp'
    ],
    'db' => [
        'host' => 'localhost',
        'user' => 'box',
        'pass' => 'box',
        'db' => 'otus10',
        'port' => null,
        'socket' => null,
        'pconnect' => false,
        'charset' => 'utf8',
        'errmode' => 'exception', //or 'error'
        'exception' => 'Exception', //Exception class name
    ]
];