<?php
	include "connect.php";
	session_start();
	if(isset($_POST['submit'])){
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$username = $_POST['username'];
		$id = $_SESSION['id'];
		$sql = "";
		if(isset($_POST['password'])){
			$password = $_POST['password'];
			$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', username='$username', password='$password' WHERE user_id='$id'";
		}
		else{
			$sql = "UPDATE users SET first_name='$first_name', last_name='$last_name', username='$username' WHERE user_id='$id'";
		}
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);		
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}
?>