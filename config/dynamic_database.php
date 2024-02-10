<?php
// config/dynamic_database.php

return [
    'connection' => env('DYNAMIC_DB_CONNECTION', 'mysql'),
    'host' => env('DYNAMIC_DB_HOST', 'localhost'),
    'database' => env('DYNAMIC_DB_DATABASE', 'dynamic_database'),
    'username' => env('DYNAMIC_DB_USERNAME', 'dynamic_username'),
    'password' => env('DYNAMIC_DB_PASSWORD', 'dynamic_password'),
];
