<?php
	include "../connect.php";
	session_start();
	$id = $_POST['id'];
?>
<label>Stalls of <?php echo $id ." department"; ?></label>
<table id="stall_data" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Stall ID</th>
			<th>Stall Availability</th>
			<th></th>
		</tr>
	</thead>
<?php
	$sql = "SELECT * FROM market_stalls WHERE stall_dept = '$id'";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
	<tr>
		<td><?php echo $data['stall_id']; ?></td>
		<td><?php if(!is_null($data['tenant_id'])){echo "Occupied"; ?>
		<th><a class="btn btn-primary">View Tenant</a></th>
		<?php }else{echo "Available"?></td>
		<th><a href="index.php?loc=occupy_stall&id=<?php echo $data['stall_id']; ?>" class="btn btn-primary">Add Tenant</a></th>
		<?php } ?>
	</tr>
<?php
	}
?>
</table>


