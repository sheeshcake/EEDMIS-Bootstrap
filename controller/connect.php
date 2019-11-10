<?php
	if(file_exists('vendor/autoload.php')){
		require 'vendor/autoload.php';
	}
	else if(file_exists('../../vendor/autoload.php')){
		require '../../vendor/autoload.php';
	}
	else{
		require '../vendor/autoload.php';
	}
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