<form method="POST" action="controller/market/register_controller.php">

  <div class="form-group">
    <label for="stall_number">Stall Number</label>
    <input type="text" class="form-control" placeholder="Stall Number">
  </div>

  <div class="form-group">
    <label for="Firstname">First Name</label>
    <input type="text" class="form-control" placeholder="First Name">
  </div>


  <div class="form-group">
    <label for="middle">Middle Name</label>
    <input type="text" class="form-control" placeholder="Middle Name">
  </div>


  <div class="form-group">
    <label for="LastName">Last Name</label>
    <input type="text" class="form-control" placeholder="Last Name">
  </div>

   <div class="form-group">
    <label for="gender">Gender</label>
                          <select name="SEX" id="SEX" class="form-control input-sm">
                            <option>Male</option>
                            <option>Female</option> 
                         </select>
                      </div>
                    </div>
                  </div>

  <div class="form-group">
    <label for="LastName">Civil Status</label>
                         <select name="CIVILSTATUS" id="CIVILSTATUS" class="form-control input-sm">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widow</option>
                         </select>
                       </div>
                     </div>


  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" placeholder="Address">
  </div>


  <div class="form-group">
    <label for="Birthdate">Birthdate</label>
    <input type="date" class="form-control" name="date">
  </div>


<!--STALL OPTION -->
  <div class="form-group">
    <label for="LastName">Stall Section</label>
                         <select name="CIVILSTATUS" id="CIVILSTATUS" class="form-control input-sm">
                           <option selected disabled>Please Select Selection</option>
                            <option>1 Fish & Foods</option>
                            <option>2 Vegetables & Spices</option>
                            <option>3 Dry Goods & Groceries</option>
                            <option>4 Flowers, Fruits & Miscellaneous</option>
                            <option>5 Meat, Dressed Chicken, Eggs, Grains, Dried Fish, Sakted Oridyctsm Cafeteruam Carenderia etc.</option>
                         </select>
                       </div>
                     </div>

  <!--STALL OPTION -->

 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" style="text-align: right;" for="personImage">Person Image:</label>
                      <div class="col-md-8">
                      <input type="file" name="personImage" value="" id="personImage"/>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" style="text-align: right;" for="stallImage">Stall Image:</label>
                      <div class="col-md-8">
                      <input type="file" name="stallImage" value="" id="stallImage"/>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" style="text-align: right;" for="graveImage">Attachment FIle:</label>
                      <div class="col-md-8">
                      <input type="file" name="attachmentfile" value="" id="attachmentfile"/>
                      </div>
                    </div>
                  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
  
</script>