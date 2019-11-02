<?php

    require 'vendor/autoload.php';
    use Medoo\Medoo;

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "eedmis-bootstrap";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	//Initializing Medoo Query Builder
    $database = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'eedmis-bootstrap',
        'server' => 'localhost',
        'username' => 'root',
        'password' => ''
    ]);