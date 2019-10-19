<h1>Sample table for testing i edit rani nako</h1>

<table class="table table-striped table-bordered" id="drivers">
	<thead>
		<tr>
			<th scope="col"></th>
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
			<td><button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['driver_id'] ?>"  data-toggle="modal" data-target="#modalHomeEvents">Schedule</button></td>
		</tr>
<?php
	}
?>
</table>

<div id="modalHomeEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">	

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="controller/ibjt/schedule_controller.php">
        <div class="modal-body">
         <label>Scheduling</label>     
        <input type="hidden" name="driver_id" id="eventId"/>
        </div>
        <input type="time" name="time" class="form-control">
        <input type="date" name="date" class="form-control">
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
$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
     $('#eventId').val(eventId);
});	
$(document).ready(function() {
    $('#drivers').DataTable(1);
} );
</script>
