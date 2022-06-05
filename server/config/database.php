<?php
$db = [
    'mysql' => [
        'DB_HOST'     => $_ENV['DB_HOST'],
        'DB_PORT'     => $_ENV['DB_PORT'],
        'DB_DATABASE' => $_ENV['DB_DATABASE'],
        'DB_USERNAME' => $_ENV['DB_USERNAME'],
        'DB_PASSWORD' => $_ENV['DB_PASSWORD'],
    ],
];
return $db['mysql'];

//return [
//    'dns'      => 'mysql:host=a_level_nix_mysql;port=3306;dbname=a_level_nix_mysql',
//    'dbname'   => 'a_level_nix_mysql',
//    'username' => 'myapp',
//    'password' => 'myapp',
//];