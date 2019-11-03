<?php
	include "../connect.php";
	session_start();
	if(isset($_POST['submit'])){
		$stall_id = $_POST['stall_id'];
		$payment_id = $_POST['payment_id'];
		$payment = $_POST['payment'];
		$date = date("Y-m-d");
		$balance = abs(1000 - (int)$payment);
		$sql = "UPDATE market_payment SET total_change='$balance', total_payment='$payment', date_paid='$date' WHERE payment_id='$payment_id'";
		$result = mysqli_query($conn, $sql);
		$date_billing = date('Y-m-d', strtotime('+1 months'));
		$sql = "INSERT INTO market_payment(stall_id,total_bill,date_billing) VALUES('$stall_id','1000','$date_billing')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);		
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}

?>