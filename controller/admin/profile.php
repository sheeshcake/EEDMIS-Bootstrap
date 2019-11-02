<?php
	include "../connect.php";
	session_start();
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE user_id='$id'";
	$result = mysqi_query($conn, $sql);
	



?>