<?php
  include "../connect.php";
  session_start();
  $tenant_id = $_POST['tenant_id'];
  $sql = "SELECT * FROM market_tenant WHERE tenant_id='$tenant_id'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
?>
<center>
  <h2><?php echo $row['first_name'] . ' ' . $row
  ['last_name']; ?></h2>
</center>
<div class="modal-body">
  <table>
    <tr>
      <td><p>Age: <?php echo $row['first_name']; ?></p></td>
      <td><p>Gender: <?php echo $row['sex']; ?></p></td>
    </tr>
    <tr>
      <td><p>Birthdate: <?php echo $row['birthdate']; ?></p></td>
      <td><p>Address: <?php echo $row['address']; ?></p></td>
    </tr>
    <tr>
      <td><p>Contact: <?php echo $row['contact_number']; ?></p></td>
      <td><p>Civil Status: <?php echo $row['civil_status']; ?></p></td>
    </tr>
  </table>
</div>
<?php
  }
?>