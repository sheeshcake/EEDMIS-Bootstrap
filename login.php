<?php
	include "controller/connect.php";
	session_start();
  if(isset($_SESSION['status'])){
    header("Location: index.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>EEDMIS Login</title>
	<link rel="stylesheet" type="text/css" href="css/login-style.css">
	<!-- <script type="text/javascript" src="js/login-script.js"></script> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cldup.com/S6Ptkwu_qA.js"></script>
</head>
<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container">
  	<?php 
  		if(isset($_SESSION['login'])){
  	?>
  			<span class="error animated tada" id="msg">Wrong username or password</span>
  	<?php
  			unset($_SESSION['login']);
  		}
  	?>
    <form name="form1" class="box" action="controller/login_controller.php"  method="post">
      <h4>EEDMO<span>Login</span></h4>
      <h5>Sign in to your account.</h5>
        <input type="text" placeholder="Username" autocomplete="off" name="username" required>
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off" required>
        <label>
          <input type="checkbox">
          <span></span>
          <small class="rmb">Remember me</small>
        </label>
        <a href="#" class="forgetpass">Forget Password?</a>
        <input type="submit" name="submit" value="Sign in" class="btn1">
      </form>
  </div> 
  <div class="footer">
      <span>EEDMIS <a href="https://facebook.com/babblefour">By HalfByte</a></span>
  </div>
</div>
</body>
<script type="text/javascript">
	var pwd = document.getElementById('pwd');
	var eye = document.getElementById('eye');

	eye.addEventListener('click',togglePass);

	function togglePass(){

	   eye.classList.toggle('active');

	   (pwd.type == 'password') ? pwd.type = 'text' : pwd.type = 'password';
	}


</script>
</html>