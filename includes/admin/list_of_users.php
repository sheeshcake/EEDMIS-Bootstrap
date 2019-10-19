<?php
	include "controller/admin/search_users.php";
?>

<table id="datatableid" class="table table-striped table-bordered table-md">
  <thead>
    <tr>
      <th class="th-sm">Users Id

      </th>
      <th class="th-sm">Name

      </th>
    </tr>
  </thead>
<?php
	if(isset($_SESSION['search'])){
		$search = $_SESSION['search'];
		$sql = "SELECT * FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR users_id LIKE '%$search%'";
	}
	else{
		$sql = "SELECT * FROM users";
	}
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
		<tr>

			<td><?php echo $data['user_id']; ?></td>
			<td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
			<td><button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['users_id'] ?>"  data-toggle="modal" data-target="#modalHomeEvents">EDIT</button></td>
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
        <form method="post" action="controller/admin/register_users_controller.php">
        <div class="modal-body">
         <label>Users</label>     
        <input type="hidden" name="users_id" id="eventId"/>
        </div>
        <input type="username" name="username" class="form-control">
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
