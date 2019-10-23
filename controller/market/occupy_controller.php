<?php
	include "../connect.php";
	session_start();
	if(isset($_POST['submit'])){
		$stall_id = $_POST['stall_id'];
		$tenant_id = $_POST['tenant_id'];
		$stall_name = $_POST['stall_name'];
		$date_time = date("Y-m-d h:i:s");
		echo $date_time;
		echo $stall_name;
		echo $tenant_id;
		echo $stall_id;
		$sql = "UPDATE market_stalls SET tenant_id='$tenant_id', stall_name='$stall_name', date_time_occupied='$date_time' WHERE stall_id='$stall_id'";
		if($result = mysqli_query($conn, $sql)){
			$_SESSION['success'] = 'yes';
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}

	}

?>