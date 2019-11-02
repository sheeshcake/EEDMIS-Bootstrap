<?php
  include "controller/connect.php";
  if(isset($_SESSION['success'])){
?>
<center>
  <div class="alert col-8 alert-success alert-dismissible fade show" role="alert">
    <strong>Hey!</strong> <?php echo $_SESSION['success']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</center>
<?php
    unset($_SESSION['success']);
  }
?>
<div class="d-flex p-2 bd-highlight">
  <div class="container border rounded col-3" style="padding: 2%;">
    <form method="POST" action="controller/slaughterhouse/price_controller.php">
      <center><h2>Create</h2></center><br>
      <div class="form-group">
        <label>Species Name</label>
        <input type="text" name="animal_name" class="form-control">
      </div>
      <div class="form-group">
        <label>Unit</label>
        <input type="text" class="form-control" name="unit">
      </div>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">₱</span>
        </div>
        <input type="number" class="form-control" placeholder="Price" aria-describedby="basic-addon1" name="price">
      </div>
      <br><br>
      <center><input type="submit" name="submit" class="btn btn-primary"></center>
    </form>
  </div>
   <div class="container-fluid border rounded col-8" style=" padding: 2%;">
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
      $sql = "SELECT * FROM slaughterhouse_pricing";
      $result = mysqli_query($conn, $sql);
      while($data = mysqli_fetch_assoc($result)){
        $a_type = $data['animal_type'];
        $sql1 = "SELECT * FROM slaughterhouse_pricing WHERE animal_type='$a_type'";
        $result1 = mysqli_query($conn, $sql1);
    ?>
      <tr>
        <form method="POST" action="controller/slaughterhouse/price_controller.php">
          <td>
            <input type="hidden" name="price_id" value="<?php echo $data['price_id']; ?>">
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
              <input type="number" class="form-control" placeholder="Price"aria-describedby="basic-addon1" name="price" value="<?php echo $data['price']; ?>">
            </div>
          </td>
          <td>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Unit</label>
              </div>
              <select class="custom-select" id="inputGroupSelect01">
                <option selected disabled>Choose...</option>
                <?php
                  while($data1 = mysqli_fetch_assoc($result1)){
                ?>
                  <option value="<?php echo $data1['unit']; ?>"><?php echo $data1['unit']; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
          </td>
          <td>
            <input type="submit" name="submit" class="btn btn-primary" value="Update">
            <input type="submit" name="submit" class="btn btn-danger" value="Delete">
          </td>
        </form>
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
  </div>
</div>

