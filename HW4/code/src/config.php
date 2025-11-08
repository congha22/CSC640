<?php
// src/config.php
return [
    'db' => [
        'host' => '127.0.0.1',
        'dbname' => 'rest_api',
        'user' => 'root',
        'pass' => 'congha',        // set your MySQL root password or create a special user
        'charset' => 'utf8mb4',
    ],
    'jwt' => [
        'secret' => 'congha', // change before submission
        'issuer' => 'rest-api-stage1',
        'expire_seconds' => 3600
    ]
];
