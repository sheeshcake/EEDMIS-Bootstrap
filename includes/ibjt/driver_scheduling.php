

<table class="table table-striped table-bordered" id="drivers">
	<thead>
		<tr>
			<th scope="col">Driver Id</th>
			<th scope="col">Name</th>
			<th scope="col"></th>
		</tr>
	</thead>
<?php
	$sql = "SELECT * FROM ibjt_drivers";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
		<tr>
			<td><?php echo $data['driver_id']; ?></td>
			<td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
			<td>
        <button class="openAddSchedule btn btn-primary" data-id="<?php echo $data['driver_id'] ?>"  data-toggle="modal" data-target="#modalAddSchedule">Schedule</button>
        <a class="btn btn-primary" href="index.php?loc=view_schedules&id=<?php echo $data['driver_id'] ?>">View Schedules</a>
      </td>
		</tr>
<?php
	}
?>
</table>

<div id="modalAddSchedule" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h4>Scheduling</h4>  
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="controller/ibjt/schedule_controller.php">
        <div class="modal-body">   
        <input type="hidden" name="driver_id" id="driver_id"/>
        </div>
        <div class="form-group">
          <label>Time</label>
          <input type="time" name="time" class="form-control" required>
        </div>
        <div>
          <label>Date</label>
          <input type="date" name="date" class="form-control" required>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Submit" name="submit" style="background-color:rgb(0,30,66); ">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>

    </div>
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).on("click", ".openAddSchedule", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
     console.log(eventId);
     $('#driver_id').val(eventId);
});	
$(document).ready(function() {
    $('#drivers').DataTable();
} );
</script>
