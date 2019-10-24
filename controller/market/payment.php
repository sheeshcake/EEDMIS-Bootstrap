<?php
	include "../connect.php";
	session_start();
	$id = $_POST['stall_id'];
?>
<form method="POST" action="controller/payyment_controller.php">
	<table id="stall_data" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Stall ID</th>
				<th>Stall Name</th>
				<th>Total Bill</th>
				<th></th>
			</tr>
		</thead>
	<?php
		$sql = "SELECT * FROM market_payment INNER JOIN market_stalls ON market_payment.stall_id=market_stalls.stall_id WHERE market_payment.stall_id='$id'";
		$result = mysqli_query($conn, $sql);
		while($data = mysqli_fetch_assoc($result)){
	?>
		<tr>
			<td><?php echo $data['stall_id']; ?></td>
			<td><?php echo $data['stall_name']; ?></td>
			<td><?php echo $data['total_bill']; ?></td>
			<td>
				<div class="input-group mb-3">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1">₱</span>
				  </div>
				  <input type="number" class="form-control" placeholder="Payment"aria-describedby="basic-addon1">
				</div>
			</td>
		</tr>
	<?php
		}
	?>
	</table>
	<div class="modal-footer">
		<input type="submit" name="submit" class="btn btn-primary" value="Done">
	</div>
</form>


