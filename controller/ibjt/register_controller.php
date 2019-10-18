<?php
	include "../connect.php";
	session_start();

	if(isset($_POST['submit'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$sql = "INSERT INTO ibjt_drivers(first_name,last_name,address,birthdate) VALUES ('$firstname','$lastname','$address','$birthdate')";
		if($result = mysqli_query($conn, $sql)){
			echo "done";
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}


?>