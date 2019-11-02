<form method="POST" action="controller/ibjt/register_driver_controller.php">
  <div class="form-group">
    <label for="Firstname">Bus Route</label>
    <select class="form-control" name="bus_rotue">
      <option>Iligan-Cagayan</option>
      <option></option>
      <option>Iligan-Cagayan</option>
    </select>
  </div>
  <div class="form-group">
    <label for="LastName">Plate Number</label>
    <input type="text" class="form-control" placeholder="Plate Number">
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" placeholder="Address">
  </div>
  <div class="form-group">
  	<label for="Birthdate"></label>
  	<input type="date" class="form-control" name="date">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
