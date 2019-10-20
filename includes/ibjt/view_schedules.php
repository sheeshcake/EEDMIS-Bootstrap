<?php
	if(isset($_GET['id'])){
		echo "<h1>" . $_GET['id'] . "</h1>";
		$sql = "SELECT * FROM ibjt_schedule";
		$result = mysqli_query($conn, $sql);
		echo json_encode(($result->fetch_assoc()));
	}
?>

<div class="wrapper">
  <div id="calendarContainer">
  	<h3>Calendar</h3>
  </div>
  <div id="organizerContainer" style="margin-left: 8px;">
  	<h3>Schedules</h3>
  </div>
</div>

<script type="text/javascript" src="js/calendar-script.js"></script>