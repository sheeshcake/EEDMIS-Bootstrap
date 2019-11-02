<label>Billing</label>
<table id="table_data" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Date Payment</th>
            <th>Stall Name</th>
            <th>Total Bill</th>
            <th></th>
        </tr>
    </thead>
<?php
    include "controller/connect.php";

    $sql = "SELECT * FROM market_payment INNER JOIN market_stalls ON market_payment.stall_id=market_stalls.stall_id";
    $result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)){
        if(is_null($data['date_paid'])){
            $s_id = $data['stall_id'];
            $sql1 = "SELECT SUM(total_bill) as sum FROM market_payment WHERE stall_id='$s_id'";
            $result1 = mysqli_query($conn, $sql1);
            $val = mysqli_fetch_array($result1);
                $total = $val['sum'];
?>
    <tr>
        <td><?php echo $data['date_billing']; ?></td>
        <td><?php echo $data['stall_name']; ?></td>
        <td><?php if(is_null($data['date_paid']))echo $total; else echo "Paid"; ?></td>
        <td>
            <button class="colapse btn btn-primary" data-toggle="collapse" stall_id="<?php echo $data['stall_id']; ?>" tenant_id="<?php echo $data['tenant_id']; ?>" data-target="#tenant_details<?php echo $data['stall_id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
            View Tenant
            </button>
            <div class="collapse" id="tenant_details<?php echo $data['stall_id']; ?>">
              <div class="card card-body" id="data<?php echo $data['stall_id']; ?>">
              </div>
            </div>
            <button data-toggle="modal" data-target="#modal" tenant_id="<?php echo $data['tenant_id']; ?>" stall_id="<?php echo $data['stall_id']; ?>" class="view_info btn btn-primary">Payment</button>
        </td>
    </tr>
<?php
        }
    }
?>
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="height:50px;">
          <h4>Payment</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="payment_data">
        </div>
    </div>
  </div>
</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
    $('#table_data').DataTable();
    $('.colapse').click(function(){
        var tenant_id = $(this).attr('tenant_id');
        var stall_id = $(this).attr('stall_id');
        console.log(tenant_id);
            $.ajax({
                url: "controller/market/view_stall_controller.php",
                method:"POST",
                data:{tenant_id:tenant_id},
                success:function(data){
                    $('#data' + stall_id).html(data);
                }
            });
        });
    $('.view_info').click(function(){
        var tenant_id = $(this).attr('tenant_id');
        var stall_id = $(this).attr('stall_id');
        console.log(tenant_id);
            $.ajax({
                url: "controller/market/payment.php",
                method:"POST",
                data:{stall_id:stall_id},
                success:function(data){
                    $('#payment_data').html(data);
                }
            });
        });
});
</script>