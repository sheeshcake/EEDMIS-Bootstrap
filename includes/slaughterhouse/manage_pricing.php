
<table class="table table-striped" id="table_data">
  <thead>
    <tr>
      <th>Spieces Name</th>
      <th>Price</th>
      <th>Unit</th>
      <th>Actions</th>
    </tr>
  </thead>

<?php
  include "controller/connect.php";

  $sql = "SELECT * FROM slaughterhouse_pricing";
  $result = mysqli_query($conn, $sql);
  while($data = mysqli_fetch_assoc($result)){
?>
  <tr>
    <td>
        <div class="form-group">
          <input type="text" class="form-control" id="s_name" aria-describedby="animal_type" placeholder="Species Name" value="<?php echo $data['animal_type']; ?>">
          <small id="animal_type" class="form-text text-muted">E.g Cow, Chicken, etc.</small>
        </div>
    </td> 
    <td>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">₱</span>
        </div>
        <input type="number" class="form-control" placeholder="Price" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $data['price']; ?>">
      </div>
    </td>
    <td>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Unit</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01">
          <option selected disabled>Choose...</option>
          <option value="pcs">Pieces</option>
          <option value="truck">Truck</option>
        </select>
      </div>
    </td>
    <td>
      <button class="btn btn-primary">Update</button>
      <button class="btn btn-danger">Delete</button>
    </td>
  </tr>
<?php
  }

?>
</table>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
  $("#table_data").DataTable();
}); 
</script>