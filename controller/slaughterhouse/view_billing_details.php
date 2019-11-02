
<?php
	include "../connect.php";
	if(isset($_POST['sched_id'])){
		$sched_id = $_POST['sched_id'];
		$sql = "SELECT * FROM slaughterhouse_billing INNER JOIN slaughterhouse_customer ON slaughterhouse_customer.customer_id=slaughterhouse_billing.customer_id WHERE slaughterhouse_billing.sched_id='$sched_id'";
		$result = mysqli_query($conn, $sql);
		while($data = mysqli_fetch_assoc($result)){
?>
	<p><h3><?php echo $data['total_bill']; ?></h3></p>
<?php
		}
	}
	else{
		echo "ERROR";
	}
?>