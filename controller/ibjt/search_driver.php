<?php
	include "../connect.php";
	session_start();

	if(isset($_POST['search'])){
		$search = $_POST['search'];
		$sql = "SELECT * FROM ibjt_drivers WHERE first_name = '$search' OR lastname = '$search'";
		$result = mysqli_query($conn, $sql);
	}


?>