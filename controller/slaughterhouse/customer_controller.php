<?php
	include "../connect.php";
	if(isset($_POST['submit'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$caontact_number = $_POST['contact_number'];
		$address = $_POST['address'];
		$sql = "INSERT INTO slaughterhouse_customer(first_name, last_name, contact_number, address) VALUES('$first_name','$last_name','$contact_number','$address')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);	
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}


?>