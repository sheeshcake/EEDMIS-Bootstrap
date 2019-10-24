<?php
  include "controller/connect.php";
  session_start();
  if(isset($_SESSION['role'])){}
  else{
    header("Location: login.php");
  }

?>
<!DOCTYPE html>
<html>
<title>EEDMIS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<body class="w3-light-grey">

<?php include "includes/layout/top_nav.php"; ?>
<div>
  <?php
    if(isset($_GET['loc'])){
      if(@fopen("includes/" . $_SESSION['role'] . "/" . $_GET['loc'] . ".php", "r")){
        include "includes/" . $_SESSION['role'] . "/" . $_GET['loc'] . ".php";
      }
      else if($_GET['loc'] == 'test'){
        include "test.php";
      }
      else{
        include "includes/layout/error-404.php";
      }
    }
    else{
        include"includes/" . $_SESSION['role'] . "/dashboard.php";
    }
  ?>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure to logout?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="btn btn-primary" href="controller/logout_controller.php">Logout</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>