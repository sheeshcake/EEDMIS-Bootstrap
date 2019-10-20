<?php
	include "../connect.php";
	session_start();

	if(isset($_POST['submit'])){
		$first_name = $_POST['first_name'];
		$middle_name = $_POST['middle_name'];
		$last_name = $_POST['last_name'];
		$CIVILSTATUS = $_POST['CIVILSTATUS'];
		$ADDRESS 	= $_POST['ADDRESS'];
		$SEX 		= $_POST['SEX'];
		$CATEGORIES = $_POST['CATEGORIES'];
		$BORNDATE	= $borndate;
		$DIEDDATE	= $dieddate; 
		$LOCATION 	= $_POST['LOCATION'];
		$GRAVENO	= $_POST['GRAVENO']; 
		$TYPE		= $_POST['TYPE']; 


		$filename = UploadImage("personImage");
		$personImage = "files/". $filename ;

		$filename = UploadImage("graveImage");
		$graveImage = "files/". $filename ;

		$filename = UploadImage("attachmentfile");
		$attachmentfile = "files/". $filename ;


		$sql = "INSERT INTO cemetery_table_people(person_id, first_name, middle_name, last_name, address, birthdate) VALUES ('$person_id', $first_name','$middle_name','$last_name','$address','$birthdate')";
		if($result = mysqli_query($conn, $sql)){
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else{
			echo("Error description: " . mysqli_error($conn));
		}
	}


?>