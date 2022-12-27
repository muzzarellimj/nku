<?php

$conf = [
    # root-level application conf
    'application' => [
        # application name - referenced in document title field and console output
        'name' => 'Foober'
    ],

    # database connection and operation conf
    'database' => [
        # database host
        'host' => 'localhost',

        # database port
        'port' => 3306,

        # database name
        'name' => 'foober',

        # database charset
        'charset' => 'utf8mb4',

        # database username
        'username' => 'root',

        # database password
        'password' => '',

        # database connection PDO options
        'options' => [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false
        ]
    ]
];