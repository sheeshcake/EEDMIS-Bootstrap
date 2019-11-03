
<div class="container" style="padding: 2%;">
  <div class="panel panel-default">
    <div class="panel-heading">Tenant Registration</div>
    <div class="panel-body">  
      <form method="POST" action="controller/market/register_controller.php">

        <div class="form-group">
          <label for="Firstname">First Name</label>
          <input type="text" class="form-control" name="first_name" placeholder="First Name">
        </div>


        <div class="form-group">
          <label for="middle">Middle Name</label>
          <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
        </div>


        <div class="form-group">
          <label for="LastName">Last Name</label>
          <input type="text" class="form-control" name="last_name" placeholder="Last Name">
        </div>

         <div class="form-group">
          <label for="gender">Gender</label>
            <select name="sex" class="form-control input-sm">
              <option>Male</option>
              <option>Female</option> 
           </select>
        </div>

        <div class="form-group">
          <label for="LastName">Civil Status</label>
           <select name="civil_status" class="form-control input-sm">
              <option>Single</option>
              <option>Married</option>
              <option>Widow</option>
           </select>
         </div>


        <div class="form-group">
          <label for="Address">Address</label>
          <input type="text" class="form-control" name="address" placeholder="address">
        </div>


        <div class="form-group">
          <label for="Birthdate">Birthdate</label>
          <input type="date" class="form-control" name="birthdate">
        </div>

        <div class="form-group">
          <label for="Birthdate">Contact Number</label>
          <input type="number" class="form-control" name="contact_number">
        </div>

        <!--STALL OPTION -->
        <center>
          <div class="col-md-8">
            <label class="col-md-4" style="text-align: right;" for="personImage">Person Image:</label>
            <div class="col-md-8">
            <input type="file" name="personImage" value="" id="personImage"/>
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

          <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </center>

      </form>
    </div>
  </div>

</div>