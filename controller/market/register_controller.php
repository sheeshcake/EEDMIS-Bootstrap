<?php
	include "../connect.php";
	session_start();

	if(isset($_POST['submit'])){
		echo $_POST['submit'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$middle_name = $_POST['middle_name'];
		$birthdate = $_POST['birthdate'];
		$sex = $_POST['sex'];
		$civil_status = $_POST['civil_status'];
		$address = $_POST['address'];
		$contact_number = $_POST['contact_number'];
		$sql = "INSERT INTO market_tenant(first_name,last_name,middle_name,birthdate,sex,civil_status,address,contact_number) VALUES('$first_name','$last_name','$middle_name','$birthdate','$sex','$civil_status','$address','$contact_number')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);	
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}

?>