<?php

	include 'connect.php';
	session_start();
	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM users WHERE username='" . $_POST["username"]. "' AND password='" . $_POST['password'] . "'";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result) == 1){
			while ($data = mysqli_fetch_assoc($result)) {
				$_SESSION['role'] = $data['user_role'];
				$_SESSION['name'] = $data['first_name'];
			}
			// echo $_SESSION['name'];
			header("Location: ../index.php");
		}
		else{
			$_SESSION['login'] = 'error';
			header("Location: ../login.php");
		}
	}
?>