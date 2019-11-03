<?php

include "../connect.php";
session_start();

$amount = $_POST["amount"];
$billing_id = $_POST["billing_id"];
$created_at = date("Y/m/d");
$change =floatval($_POST["amount"]) - floatval( $_POST["price"]);

$sql = "INSERT INTO slaughterhouse_payments(total_paid, total_change, billing_id, created_at) VALUES('$amount','$change','$billing_id', '$created_at')";
if($result = mysqli_query($conn, $sql)){
    $_SESSION['success'] = 'Create Success :)';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
    echo("Error description: " . mysqli_error($conn));
}