<?php
	include "../connect.php";
	session_start();
	if(isset($_POST['submit'])){
		$submit = $_POST['submit'];
		if($submit == 'Update'){
			$price_id = $_POST['price_id'];
			$s_name = $_POST['s_name'];
			$price = $_POST['price'];
			$unit = $_POST['unit'];
			$sql = "UPDATE slaughterhouse_pricing SET animal_type='s_name', unit='$unit', price='$price' WHERE price_id='$price_id'";
			if($result = mysqli_query($conn, $sql)){
				$_SESSION['success'] = 'Update Success :)';
				header('Location: ' . $_SERVER['HTTP_REFERER']);		
			}
			else{
				echo("Error description: " . mysqli_error($conn));
			}

		}
		if($submit == 'Delete'){
			$id = $_POST['price_id'];
			$sql = "DELETE FROM slaughterhouse_pricing WHERE price_id='$id'";
			if($result = mysqli_query($conn, $sql)){
				$_SESSION['success'] = 'Delete Success :)';
				header('Location: ' . $_SERVER['HTTP_REFERER']);		
			}
			else{
				echo("Error description: " . mysqli_error($conn));
			}
		}
		if($submit == 'Submit'){
			$animal_name = $_POST['animal_name'];
			$unit = $_POST['unit'];
			$price = $_POST['price'];
			$sql = "INSERT INTO slaughterhouse_pricing(animal_type, unit, price) VALUES('$animal_name','$unit','$price')";
			if($result = mysqli_query($conn, $sql)){
				$_SESSION['success'] = 'Create Success :)';
				header('Location: ' . $_SERVER['HTTP_REFERER']);		
			}
			else{
				echo("Error description: " . mysqli_error($conn));
			}
		}
	}


?>