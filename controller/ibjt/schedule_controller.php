<?php
	include "../connect.php";
	session_start();
	if(isset($_POST['submit'])){
		$driver_id = $_POST['driver_id'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$sql = "INSERT INTO ibjt_schedule(driver_id, schedule_time, schedule_date) VALUES ('$driver_id','$time','$date')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);		
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}

	}



?>