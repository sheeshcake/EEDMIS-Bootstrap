
<h3>Renters</h3>
<table class="table table-striped table-bordered" id="tenants">
	<thead>
		<tr>
      <th scope="col">Person Name</th>
      <th scope="col">Address</th>
      <th scope="col"></th> 
		</tr>
	</thead>
<?php
	$sql = "SELECT * FROM market_tenant";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
		<tr>
			<td><?php echo $data['first_name'] . ' ' . $data['last_name']; ?></td>
      <td><?php echo $data['address']; ?></td>
			<td>
        <button class="view_info btn btn-primary" id="<?php echo $data['tenant_id'] ?>"  data-toggle="modal" data-target="#modal">View Details</button>
        <button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['tenant_id'] ?>"  data-toggle="modal" data-target="#modal">View Stalls</button>
        <button class="open-homeEvents btn btn-primary" data-id="<?php echo $data['tenant_id'] ?>"  data-toggle="modal" data-target="#modal">Add Stalls</button>
      </td>
		</tr>
<?php
	}
?>
</table>

<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h4>Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="data">
        </div>
    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).on("click", ".open-homeEvents", function () {
     var eventId = $(this).data('id');
     $('#idHolder').html( eventId );
     $('#eventId').val(eventId);
});	
$(document).ready(function() {
    $('#tenants').DataTable();
});
$(document).ready(function() {
    $('.view_info').click(function(){
        var id = $(this).attr('id');
            $.ajax({
                url: "controller/market/view_tenant.php",
                method:"POST",
                data:{id:id},
                success:function(data){
                    $('#data').html(data);
                }
            });
        });
});
</script>
