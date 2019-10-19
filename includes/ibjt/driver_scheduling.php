<?php
	include "controller/ibjt/search_driver.php";
?>

<form method="POST">
	<input type="text" class="form-control" name="search" placeholder="Search">
</form>
<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Driver Id</th>
			<th scope="col">Name</th>
			<th scope="col"></th>
		</tr>
	</thead>
<?php
	if(isset($_SESSION['search'])){
		$search = $_SESSION['search'];
		$sql = "SELECT * FROM ibjt_drivers WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR driver_id LIKE '%$search%'";
	}
	else{
		$sql = "SELECT * FROM ibjt_drivers";
	}
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.css">

<script>
$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
     $('#eventId').val(eventId);
});	
</script>
