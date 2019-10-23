<?php
	include "../connect.php";
	session_start();
	$id = $_POST['id'];
	$sql = "SELECT * FROM market_tenant WHERE tenant_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
?>
<center>
	<h2><?php echo $row['first_name'] . ' ' . $row
	['last_name']; ?></h2>
</center>
<div class="modal-body">
	<table>
		<tr>
			<td><p>Age: <?php echo $row['first_name']; ?></p></td>
			<td><p>Gender: <?php echo $row['sex']; ?></p></td>
		</tr>
		<tr>
			<td><p>Birthdate: <?php echo $row['birthdate']; ?></p></td>
			<td><p>Address: <?php echo $row['address']; ?></p></td>
		</tr>
		<tr>
			<td><p>Contact: <?php echo $row['contact_number']; ?></p></td>
			<td><p>Civil Status: <?php echo $row['civil_status']; ?></p></td>
		</tr>
	</table>
</div>
<div class="modal-body">
	<label>Stalls</label>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Stall ID</th>
			<th>Stall Department</th>
			<th>Stall Name</th>
			<th></th>
		</tr>
<?php
	}
	$sql = "SELECT * FROM market_stalls WHERE tenant_id = '$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
?>
		<tr>
			<td><?php echo $row['stall_id']; ?></td>
			<td><?php echo $row['stall_dept']; ?></td>
			<td><?php echo $row['stall_name']; ?></td>
			<td><button class="btn btn-danger">Remove</button></td>
		</tr>
<?php
	}


?>
	</table>
</div>