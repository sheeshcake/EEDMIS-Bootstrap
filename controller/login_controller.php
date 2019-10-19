<?php

	include 'connect.php';
	session_start();
	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM users WHERE username='" . $_POST["username"]. "' AND password='" . $_POST['password'] . "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			$_SESSION['status'] = 'logged in!';
			header("Location: ../index.php");
		}
		else{
			$_SESSION['login'] = 'error';
			header("Location: ../login.php");
		}
	}
?>