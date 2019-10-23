<!-- PHP Data to Bootstrap Modal -->

<table class="table table-striped table-bordered">
<thead>
		<tr>
			<th scope="col">Test Id</th>
			<th scope="col">Test Data</th>
			<th scope="col"></th>
		</tr>
	</thead>
<?php
	$sql = "SELECT * FROM test";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
		<tr>
			<td><?php echo $data['test_id']; ?></td>
			<td id="<?php echo $data['test_id']; ?>"><?php echo $data['data1']; ?></td>
			<td><button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['test_id'] ?>"  data-toggle="modal" data-target="#modalHomeEvents">Schedule</button></td>
		</tr>
<?php
	}
?>
</table>

<div id="modalHomeEvents" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <!-- Dri na ka mag butang ug Form para sa submit Button -->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
         <label id="title"></label>     
        <input type="hidden" name="driver_id" id="eventId"/>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Submit" name="submit" style="background-color:rgb(0,30,66); ">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>


$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
     var customerId = $('#' + eventId).html();  
     console.log(customerId);
     $('#title').html('Click Data: ' + customerId);
});	
$(document).ready(function() {
    $('#drivers').DataTable(1);
} );
</script>


