

<table class="table table-striped table-bordered" id="drivers">
	<thead>
		<tr>
			<th scope="col">Person Id</th>
			<th scope="col">Person Name</th>
      <th scope="col">Civil Status</th>
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col">Age</th>
      <th scope="col">Born</th>
      <th scope="col">Died</th>  
      <th scope="col">Section</th>   
      <th scope="col">Location</th>  
      <th scope="col">Type</th>  
      <th scope="col">Photo</th>
      <th scope="col">GravePic</th>   
      <th scope="col">Options</th> 
		</tr>
	</thead>
<?php
	$sql = "SELECT * FROM cemetery_table_people";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
		<tr>

			<td><?php echo $data['people_id']; ?></td>
			<td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
      <td><?php echo $data['civil_status']; ?></td>
      <td><?php echo $data['address']; ?></td>
      <td><?php echo $data['sex']; ?></td>
      <td><?php echo $data['age']; ?></td>
      <td><?php echo $data['borndate']; ?></td>
      <td><?php echo $data['dieddate']; ?></td>
      <td><?php echo $data['categories']; ?></td>
      <td><?php echo $data['location']; ?></td>
      <td><?php echo $data['type']; ?></td>
      <td><?php echo $data['photo']; ?></td>
      <td><?php echo $data['gravepic']; ?></td>


			<td><button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['people_id'] ?>"  data-toggle="modal" data-target="#modalHomeEvents">Update</button></td>
		</tr>
<?php
	}
?>
</table>


<!-- MODAL CONTENT for edit ga libog ko anang modal sho ba-->

<div id="modalHomeEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h5 class="modal-title" id="exampleModalLabe"> Update Information </h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form method="post" action="controller/cemetery/update_controller.php">

        <div class="modal-body">

        <input type="hidden" name="person_id" id="eventId"/>
        </div>

        <div class="form-group">
          <label> First Name </label>
          <input type="text" name="first_name" id="first_name" class="form-control">
        </div>

        <div class="form-group">
          <label> Middle Name </label>
          <input type="text" name="middle_name" id="middle_name" class="form-control">
        </div>

        <div class="form-group">
          <label> Last Name </label>
          <input type="text" name="last_name" id="last_name" class="form-control">
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
$(document.ready(function(){
  $('.editbtn').on('click', function(){

    $('#editmodal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function() {
      return $(this).text();
    }).get();

    console.log(data);

    $('#update_id').val(data[0]);
    $('#first_name').val(data[1]);
    $('#middle_name').val(data[2]);
    $('#last_name').val(data[3]);
    });
  });

$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
     $('#eventId').val(eventId);
});	
$(document).ready(function() {
    $('#drivers').DataTable(1);
} );
</script>
