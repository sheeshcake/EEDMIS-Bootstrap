<?php
	include "../connect.php";
	session_start();

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$sql = "INSERT INTO users(username,password,first_name,last_name,address,birthdate) VALUES ('$username','$password','$firstname','$lastname')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}


?>