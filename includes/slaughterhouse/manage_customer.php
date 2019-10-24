<div class="container border rounded" style="padding: 2%;">
  <form method="POST" action="controller/slaughterhouse/customer_controller.php">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label>First Name</label>
        <input type="text" class="form-control" name="first_name" placeholder="First Name">
      </div>
      <div class="form-group col-md-6">
        <label>Last Name</label>
        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
      </div>
      <div class="form-group col-md-6">
        <label>Contact Number</label>
        <input type="number" class="form-control" name="contact_number" placeholder="Contact Number">
      </div>
    </div>
    <div class="form-group">
      <label>Address</label>
      <input type="text" class="form-control" name="address" placeholder="1234 Main St">
    </div>
    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
  </form>
</div>