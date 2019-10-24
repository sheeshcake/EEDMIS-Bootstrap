<?php
	include "controller/connect.php";

	if(isset($_GET['id'])){
		$id = $_GET['id'];


	}else{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

?>