<?php
	include "../connect.php";
	session_start();
	$id = $_POST['stall_id'];
?>
<form method="POST" action="controller/market/payment_controller.php">
	<table id="stall_data" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Payment ID</th>
				<th>Stall ID</th>
				<th>Stall Name</th>
				<th>Total Bill</th>
				<th>Status</th>
			</tr>
		</thead>
	<?php
		$sql = "SELECT * FROM market_payment INNER JOIN market_stalls ON market_payment.stall_id=market_stalls.stall_id WHERE market_payment.stall_id='$id'";
		$result = mysqli_query($conn, $sql);
		while($data = mysqli_fetch_assoc($result)){
	?>
		<tr>
			<input type="hidden" name="stall_id" value="<?php echo $data['stall_id']; ?>">
			<input type="hidden" name="payment_id" value="<?php echo $data['payment_id']; ?>">
			<td><?php echo $data['payment_id']; ?></td>
			<td><?php echo $data['stall_id']; ?></td>
			<td><?php echo $data['stall_name']; ?></td>
			<td><?php echo $data['total_bill']; ?></td>
			<td><?php if($data['total_bill'] == 0) echo "PAID"; if($data['total_bill'] < 0) echo "Advanced Payment"; if($data['total_bill'] > 0) echo "Unpaid"; ?></td>
		</tr>
	<?php
		}
	?>
	</table>
	<div class="input-group mb-3">
	  <div class="input-group-prepend">
	    <span class="input-group-text" id="basic-addon1">₱</span>
	  </div>
	  <input type="number" class="form-control" placeholder="Payment"aria-describedby="basic-addon1" name="payment">
	</div>
	<div class="modal-footer">
		<input type="submit" name="submit" class="btn btn-primary" value="Done">
	</div>
</form>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
	$("#stall_data").DataTable( {
        "order": [[ 0, "desc" ]],
        "lengthMenu": [[5, 15, 50, -1], [5, 15, 50, "All"]]
    } );
});	
</script>


