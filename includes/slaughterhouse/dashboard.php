<?php
	include "controller/connect.php";

?>
<center>
	<div class="col-3">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item active" aria-current="page"><strong>Date:</strong><?php echo date("Y-m-d"); ?></li>
		  </ol>
		</nav>
	</div>
</center>
<div class="d-flex p-5">
<?php
	$sql = "SELECT * FROM slaughterhouse_schedule INNER JOIN  slaughterhouse_customer ON slaughterhouse_schedule.customer_id=slaughterhouse_customer.customer_id";
	$result = mysqli_query($conn, $sql);
	$date = date("Y-m-d");
	while($data = mysqli_fetch_assoc($result)){
		if($data['sched_date'] == $date){
?>
<div class="d-flex p-2 bd-highlight">
	<div class="card" style="width: 18rem;">
	  <img class="card-img-top" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRWomCiEvIm64KCtM5g7k3Aq4s2iS_v0WdAy6L2fFt3-HU-rFhP" alt="Image">
	  <div class="card-body">
	    <h5 class="card-title"><?php echo $data['first_name'] . " " . $data['last_name']; ?></h5>
	    <p><strong>Time</strong><?php echo $data['sched_time']; ?></p>
	    <center>
	    	<button  id="<?php echo $data['sched_id']; ?>" data-toggle="modal" data-target="#customer_details" class="view_info btn btn-primary">View Details</button>
	    </center>
	  </div>
	</div>
</div>
<?php
		}
	}	
?>
</div>
<div class="modal fade" id="customer_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="data">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {
    $('.view_info').click(function(){
        var sched_id = $(this).attr('id');
            $.ajax({
                url: "controller/slaughterhouse/view_billing_details.php",
                method:"POST",
                data:{sched_id:sched_id},
                success:function(data){
                    $('#data').html(data);
                }
            });
        });
});
</script>
