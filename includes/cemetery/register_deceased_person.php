<form method="POST" action="controller/cemetery/register_deceased_person_controller.php">
  <form class="form-horizontal span6" action="controller/cemetery/add_deceased_person.php" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Add New Person</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 
                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "GRAVENO">Number:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="GRAVENO" name="GRAVENO" placeholder=
                            "Grave Number" type="text" value="">
                      </div>
                    </div>
                  </div> 

                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FNAME">First Name:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="first_name" name="first_name" placeholder=
                            "First Name" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FNAME">Middle Name:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="middle_name" name="middle_name" placeholder=
                            "Middle Name" type="text" value="">
                      </div>
                    </div>
                  </div> 

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "FNAME">Last Name:</label>

                      <div class="col-md-8">
                            <input class="form-control input-sm" id="last_name" name="last_name" placeholder=
                            "Last Name" type="text" value="">
                      </div>
                    </div>
                  </div> 

                <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "CIVILSTATUS">Civil Status:</label>

                      <div class="col-md-8">
                         <select name="CIVILSTATUS" id="CIVILSTATUS" class="form-control input-sm">
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widow</option>
                         </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "ADDRESS">Address:</label>

                      <div class="col-md-8">
                            <textarea name="ADDRESS" id="ADDRESS" class="form-control input-sm" placeholder="Address"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "SEX">Gender:</label>

                      <div class="col-md-8">
                          <select name="SEX" id="SEX" class="form-control input-sm">
                            <option>Male</option>
                            <option>Female</option> 
                         </select>
                      </div>
                    </div>
                  </div>


              <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BORNDATE">Born:</label>

                      <div class="col-md-8">
                       <div class="input-group" id=""> 
                          <div class="input-group-addon"> 
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input id="datemask2" name="BORNDATE"  value="" type="date" class="form-control input-sm datemask2"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask >
                        </div>
                      </div>
                    </div>
                  </div>

                   <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DIEDDATE">Died:</label>

                      <div class="col-md-8">
                       <div class="input-group" id=""> 
                          <div class="input-group-addon"> 
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input id="datemask2" name="DIEDDATE"  value="" type="date" class="form-control input-sm datemask2"   data-inputmask="'alias': 'mm/dd/yyyy'" data-mask >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "LOCATION">Location:</label> 
                      <div class="col-md-8">
                             
                      <select class="form-control input-sm" name="LOCATION" id="LOCATION">
                          <option value="None">Select Location</option>
                          <option value="PALAO PUBLIC CEMETERY">PALAO PUBLIC CEMETERY</option>
                          <option value="VILLA VERDE PUBLIC CEMETERY">VILLA VERDE PUBLIC CEMETERY</option>
                          <option value="DALIPUGA PUBLIC CEMETERY">DALIPUGA PUBLIC CEMETERY</option>
          
                        </select> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "TYPE">Type:</label>

                      <div class="col-md-8">
                          <select name="TYPE" id="TYPE" class="form-control input-sm">
                            <option>BURIAL</option>
                            <option>RESERVATION</option> 
                         </select>
                      </div>
                    </div>
                  </div>

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
                      <label class="col-md-4" style="text-align: right;" for="graveImage">Grave Image:</label>
                      <div class="col-md-8">
                      <input type="file" name="graveImage" value="" id="graveImage"/>
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





                  
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>
       
          
        </form>