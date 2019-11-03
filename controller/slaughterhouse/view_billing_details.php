<?php
	include "../connect.php";
	if(isset($_POST['sched_id'])){
		
		$sched_id = $_POST['sched_id'];
		$sql = "SELECT * FROM slaughterhouse_billing INNER JOIN slaughterhouse_customer ON slaughterhouse_customer.customer_id=slaughterhouse_billing.customer_id WHERE slaughterhouse_billing.sched_id='$sched_id'";
		$result = mysqli_query($conn, $sql);
		while($data = mysqli_fetch_assoc($result)){
			$sql1 = "SELECT * FROM slaughterhouse_pricing WHERE price_id='" . $data['price_id'] . "'";
			$result1 = mysqli_query($conn, $sql1);
			while($data1 = mysqli_fetch_assoc($result1)){
?>
		<p><h3>Name:</h3><?php echo $data['first_name'] . " " . $data['last_name']; ?></p>
		<p><h3>Animal Type:</h3><?php echo $data1['animal_type']; ?></p>
		<p><h3>Price:</h3><?php echo $data1['price']; ?></p>
		<p><h3>Quantity:</h3><?php echo (int)$data['total_bill']/(int)$data1['price'] . $data1['unit']; ?></p>
		<p><h3>Total:</h3><?php echo $data['total_bill']; ?></p>
<?php
			}
		}
	}
	else{
		echo "ERROR";
	}
?>