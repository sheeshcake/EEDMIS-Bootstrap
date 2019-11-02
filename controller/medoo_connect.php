<?php

require 'vendor/autoload.php';
use Medoo\Medoo;

//Initializing Medoo Query Builder
$database = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'eedmis-bootstrap',
    'server' => 'localhost',
    'username' => 'root',
    'password' => ''
]);