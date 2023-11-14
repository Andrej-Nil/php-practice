<?php

return [
    'host' => 'localhost',
    'dbname' => 'php_practice',
    'username' => 'root',
    'password' => 1234,
    'charset' => 'utf8',
    'options' => [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ],
];