

<table class="table table-striped table-bordered" id="drivers">
	<thead>
		<tr>
			<th scope="col">Stall Number</th>
      <th scope="col">Person Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Civil Status</th>
      <th scope="col">Address</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Stall Section</th>   
      <th scope="col">Photo</th>
      <th scope="col">Stall Image</th>   
      <th scope="col">Attachment File</th> 
      <th scope="col">Options</th> 
		</tr>
	</thead>
<?php
	$sql = "SELECT * FROM market_tbl_renters";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
		<tr>

			<td><?php echo $data['stall_id']; ?></td>
			<td><?php echo $data['f_name'] . ' ' . $data['l_name']; ?></td>
      <td><?php echo $data['gender']; ?></td>
      <td><?php echo $data['c_status']; ?></td>
      <td><?php echo $data['address']; ?></td>
      <td><?php echo $data['b_date']; ?></td>
      <td><?php echo $data['stall_section']; ?></td>
      <td><?php echo $data['person_image']; ?></td>
      <td><?php echo $data['stall_image']; ?></td>
      <td><?php echo $data['attachment_file']; ?></td>
			<td><button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['market_id'] ?>"  data-toggle="modal" data-target="#modalHomeEvents">Modify</button></td>
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
        <form method="post" action="controller/market/list_stall_controller.php">
        <div class="modal-body">
         <label>Scheduling</label>     
        <input type="hidden" name="market_id" id="eventId"/>
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
