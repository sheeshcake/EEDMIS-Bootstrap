<?php
	include "controller/connect.php";

	if(isset($_POST['search'])){
		$_SESSION['search'] = $_POST['search'];
		$search = $_POST['search'];
	}


?>