<?php
	include "../connect.php";
	if(isset($_POST['id'])){	
		$sql = "UPDATE market_stalls SET tenant_id=NULL, stall_name=NULL,date_time_occupied=NULL WHERE stall_id=" . $_POST['id'] . "";
		if($result = mysqli_query($conn, $sql)){
			$_SESSION['success'] = 'yes';
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}
	else{
		echo "error";
	}
	


?>