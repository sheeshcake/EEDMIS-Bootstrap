<?php
	include "../connect.php";

	if(isset($_POST['submit'])){
		$sched_time = $_POST['sched_time'];
		$sched_date = $_POST['sched_date'];
		$price_id = $_POST['price_id'];
		$unit = $_POST['unit'];
		$customer_id = $_POST['customer_id'];
		$sql = "INSERT INTO slaughterhouse_schedule(customer_id,price_id,sched_time,sched_date) VALUES('$customer_id', '$price_id', '$sched_time', '$sched_date')";
		$result = mysqli_query($conn, $sql);
		$sched_id = $conn->insert_id;
		$sql = "SELECT price FROM slaughterhouse_pricing WHERE price_id='$price_id'";
		$result = mysqli_query($conn, $sql);
		$unit_price = mysqli_fetch_assoc($result);
		$total_bill = $unit * (int)$unit_price['price'];
		echo $total_bill;
		$sql = "INSERT INTO slaughterhouse_billing(customer_id,sched_id,price_id,total_bill) VALUES('$customer_id','$sched_id','$price_id','$total_bill')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);	
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}

	}


?>