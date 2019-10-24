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
	<table class="table table-striped table-bordered" id="table">
		<thead>
			<tr>
				<th>Stall ID</th>
				<th>Stall Department</th>
				<th>Stall Name</th>
				<th></th>
			</tr>
		</thead>
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
			<td><button data-toggle="modal" data-target="#exampleModal" id="<?php echo $row['stall_name']; ?>" class="btn btn-danger">Remove</button></td>
		</tr>
<?php
	}


?>
	</table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure to remove <p id="name"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary">No</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
	$("#table").DataTable();
	$(".btn").click(function() {
	     var name = $(this).attr('id');
	     $('#name').html(name);
     });
});	
</script>