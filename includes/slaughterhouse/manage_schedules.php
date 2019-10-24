<div class="container-fluid border rounded" style="padding: 2%;">
	<table class="table table-striped" id="table_data">
	  <thead>
	    <tr>
	      <th>Customer Name</th>
	      <th>Date</th>
	      <th>Time</th>
	      <th>Actions</th>
	    </tr>
	  </thead>
	<?php
		$date_now = date("Y-m-d");
		echo $date_now;
		$sql = "SELECT * FROM slaughterhouse_schedule INNER JOIN slaughterhouse_customer WHERE slaughterhouse_schedule.customer_id=slaughterhouse_customer.customer_id";
		$result = mysqli_query($conn, $sql);
		while($data = mysqli_fetch_assoc($result)){
			if($date_now != $data['sched_date']){

	?>
		<tr>
			<td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
			<td><?php echo $data['sched_date']; ?></td>
			<td><?php echo $data['sched_time']; ?></td>
			<td>
				<button data-toggle="modal" data-target="#details" class="show_details btn btn-primary" data="<?php echo $data['sched_id']; ?>" >Show Details</button>
			</td>
		</tr>
	<?php
			}

		}


	?>

	</table>
	<button class="btn btn-primary" data-toggle="modal" data-target="#add">New Schedule</button>
</div>
<div id="add" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Add Schedules</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form style="padding: 2%;" method="POST" action="controller/slaughterhouse/schedule_controller.php">
			<div class="form-group">
				<label>Time</label>
				<input type="time" class="form-control" name="sched_time" required>
			</div>
			<div class="form-group">
				<label>Date</label>
				<input type="date" class="form-control" name="sched_date" required>
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Animal Type</label>
			  </div>
			  <select class="custom-select" id="inputGroupSelect01" name="price_id" required>
			    <option selected disabled>Choose...</option>
			   	<?php
			   		$sql = "SELECT * FROM slaughterhouse_pricing";
			   		$result = mysqli_query($conn, $sql);
			   		while($data = mysqli_fetch_assoc($result)){
			   	?>
			    <option unit="<?php echo $data['unit']; ?>" value="<?php echo $data['price_id']; ?>"><?php echo $data['animal_type']; ?></option>
			    <?php
			    	}
			    ?>
			  </select>
			</div>
			<div class="input-group mb-3" id="units" style="display: none;">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01" id="unit"></label>
			    <input type="number" name="unit" required>
			  </div>
			</div>
			<table class="table" id="table_data1">
				<thead>
					<tr>
						<th>Name</th>
						<th></th>
					</tr>
				</thead>
			<?php
				$sql = "SELECT * FROM slaughterhouse_customer";
				$result = mysqli_query($conn, $sql);
				while($data = mysqli_fetch_assoc($result)){
			?>
				<tr>
					<td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
					<td>
						<input type="checkbox" name="customer_id" value="<?php echo $data['customer_id'] ?>">Select
					</td>
				</tr>
			<?php
				}
			?>
			</table>
			<center><input type="submit" name="submit" value="Submit" class="btn btn-primary"></center>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="details_data">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
	$("#table_data").DataTable();
	$("#table_data1").DataTable();
	$("#inputGroupSelect01").change(function(){
		$("#units").show();
		var unit = "By " + $('option:selected', this).attr('unit');
		$('#unit').html(unit);
	});
	$(".show_details").click(function(){
		var sched_id = $(this).attr('data');
		$.ajax({
                url: "controller/slaughterhouse/view_billing_details.php",
                method:"POST",
                data:{sched_id:sched_id},
                success:function(data){
                    $('#details_data').html(data);
                }
            });
	});
}); 
</script>