<?php
	include "../connect.php";
	session_start();
	$id = $_POST['id'];
	$sql = "SELECT * FROM users WHERE user_id='$id'";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
?>
<center>
	<h2><?php echo $row['first_name'] . ' ' . $row
	['last_name']; ?></h2>
</center>
<div class="modal-body">
	<center>
		<span class="badge badge-warning"><?php echo $row['user_role']; ?></span>
	</center>
	<br>
	<br>
	<div style="display: flex;">
		<strong>Userame:</strong>
		<input class="form-control" type="username" value="<?php echo $row['username']; ?>">
	</div>
	<br>
	<div style="display: flex;">
		<strong>Password:</strong>
		<input class="form-control" type="password" id="pass" value="<?php echo $row['password']; ?>">
	</div>
</div>
<?php
	}
?>
</div>
