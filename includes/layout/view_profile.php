<?php
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE user_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($data = mysqli_fetch_assoc($result)){
?>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1><?php echo $data['first_name'] . " " . $data
  		['last_name']; ?></h1></div>
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>
        <div class="panel panel-default">
            <div class="panel-heading">Department</div>
            <div class="panel-body"><?php echo $data['user_role']; ?></div>
		</div>
          
        </div><!--/col-3-->
    	<div class="col-sm-9">

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  <form class="form" action="controller/profile_controller.php" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label>
                              <input required type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." value="<?php echo $data['first_name'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label>
                              <input required type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any." value="<?php echo $data['last_name'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="username"><h4>Username</h4></label>
                              <input required type="username" class="form-control" name="username" id="username" placeholder="password" title="enter your username." value="<?php echo $data['username'];?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input required type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input required type="password" class="form-control" name="password2" id="password2" placeholder="password2" oninput="check(this);" title="enter your password2.">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
                              	<input id="sub" style="display: none;" class="btn btn-lg btn-success" type="submit" value="Save" name="submit">
                            </div>
                      </div>
              	</form>
              
              <hr>
              
             </div><!--/tab-pane-->

        </div><!--/col-9-->
    </div><!--/row-->
<?php
	}
?>

<script>
	function check(text){
		// alert(text.value);
		var pass = document.getElementById("password").value;
		if(pass == text.value){
			$("#sub").show();
		}
		else{
			$("#sub").hide();
		}
	}
</script>