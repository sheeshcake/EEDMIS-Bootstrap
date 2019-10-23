<div>
	<form  style="display: flex;" method="POST" action="controller/market/occupy_controller.php">
		<div class="card" style="width: 18rem;">
		  <img class="card-img-top" src="https://media.istockphoto.com/photos/wooden-market-stand-stall-with-red-white-striped-awning-picture-id543988620?k=6&m=543988620&s=612x612&w=0&h=33lIedaN4yvqrV7OaquT2PZaG0BJu-8iCT9hva5kKDg=" alt="Card image cap">
		  <div class="card-body">
		  	<input type="hidden" name="stall_id" value="<?php echo $_GET['id']; ?>">
		<?php
			include "controller/connect.php";
			if(isset($_GET['id'])){
				$id = $_GET['id'];
				$sql = "SELECT * FROM market_stalls WHERE stall_id='$id'";
				$result = mysqli_query($conn, $sql);
				while($data = mysqli_fetch_assoc($result)){
		?>
			<div class="form-group">
				<label>Stall Name</label>
			    <input class="card-title" name="stall_name" placeholder="Stall Name" required>
			</div>
		    <p class="card-text"><label>Stall ID: </label><?php echo $data['stall_id']; ?></p>
		    <input class="btn btn-primary" name="submit" type="submit" value="Submit">
		<?php
				}
			}
			else header('Location: ' . $_SERVER['HTTP_REFERER']);
		?>
		  </div>
		</div>
	    <div class="card" style="margin: 0 2%; width: 100%;">
			<div class="modal-header">Tenants</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered" id="tenants">
					<thead>
						<tr>
							<th>Tenant ID</th>
							<th>Tenant Name</th>
							<th></th>
						</tr>
					</thead>

					<?php
						$sql = "SELECT * FROM market_tenant";
						$result = mysqli_query($conn, $sql);
						while($data = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $data['tenant_id']; ?></td>
						<td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
						<td><input type="radio" name="tenant_id" value="<?php echo $data['tenant_id']; ?>" required>Select</td>
					</tr>
					<?php
						}
					?>
				</table>
			</div>
	    </div>
	</form>
</div>
<div class="modal" tabindex="-1" role="dialog" id="success">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Operation Success!</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready( function () {
    $('#tenants').DataTable();
    var yetVisited = '<?php if(isset($_SESSION['success'])) echo $_SESSION['success'];?>';
    if (yetVisited == 'yes') {
    	$('#success').modal('show');
        localStorage['visited'] = "no";
    }
    $('#close').click(function(){
    	window.location = "index.php?loc=map";
    })
} );
</script>
<?php
	if(isset($_SESSION['success']))  unset($_SESSION['success']);
?>