<?php 
$search = isset( $_POST['search']) ? $_POST['search'] : "";
// $search = isset( $_GET['name']) ? $_GET['name'] : "";
$location = isset($_GET['location']) ? $_GET['location'] : '';
?>
<style type="text/css">
/*	.scrollxy {
   width: auto;
    height:410px;
    border: thin solid black;
    overflow: auto; 
    overflow-x: hidden;
}  */
.stretch {

	text-align: center;
}
.stretch img {
	width: 25%; 
}
</style>
 <h2 style="text-align:center">Deceased Person</h2>
<div class="container scrollxy">  
 
		<?php

		if (isset($_GET['location'])) {
			# code...
			if (isset($_GET['name'])) {
				# code...
				$sql = "SELECT * FROM cemetery_table_people WHERE LOCATION='".$location."' AND grave_no = '".$_GET['grave_no']."' AND f_name ='".$_GET['name']."'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$numrows = $mydb->num_rows($cur);//get the number of count
			}else{
				$sql = "SELECT * FROM cemetery_table_people WHERE LOCATION='".$location."'";
				$mydb->setQuery($sql);
				$cur = $mydb->executeQuery();
				$numrows = $mydb->num_rows($cur);//get the number of count
			}
		 
		}elseif (isset( $_POST['search'])){
			$sql = "SELECT * FROM cemetery_table_people WHERE  grave_no LIKE '%".$search."%' OR FNAME LIKE '%".$search."%'";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$numrows = $mydb->num_rows($cur);//get the number of count
		}else{
			$sql = "SELECT * FROM cemetery_table_people";
			$mydb->setQuery($sql);
			$cur = $mydb->executeQuery();
			$numrows = $mydb->num_rows($cur);//get the number of count
		}
  
	# code...
	if ($numrows > 0) {
				# code... 
	  		$cur = $mydb->loadResultList();

			foreach ($cur as $res) { 

			  @$formatdate = date_format(date_create($res->DIEDDATE),'m/d/Y');
			  $birthDate = $formatdate; 
			  $birthDate = explode("/", $birthDate); 
			  @$Burried = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			    ? ((date("Y") - $birthDate[2]) - 1)
			    : (date("Y") - $birthDate[2])); 

					$borndate =  ($res->BORNDATE !='0000-00-00') ? date_format(date_create($res->BORNDATE), "m/d/Y"): 'NONE';
					$dieddate =  ($res->DIEDDATE !='0000-00-00') ? date_format(date_create($res->DIEDDATE), "m/d/Y") : 'NONE';


 					$age = date_diff(date_create($borndate),date_create($dieddate))->y;


?>

				<div style="border:1px solid #ddd;padding:5px" >
					<div class="row"> 
						<div class="col-lg-9 col-sm-12">
							<div class="col-lg-3">Name:</div>
							<div class="col-lg-3"><a href="index.php?q=person&grave_no=<?php echo $res->grave_no;?>&name=<?php echo $res->FNAME;?>&location=<?php echo $res->LOCATION;?>&section=<?php echo $res->CATEGORIES;?>"><?php echo $res->f_name;?></a></div>
							<div class="col-lg-3">Address:</div>
							<div class="col-lg-3"><?php echo $res->ADDRESS;?></div>

							<div class="col-lg-3">Age:</div>
							<div class="col-lg-3"><?php echo $age;?></div>
							<div class="col-lg-3">Born:</div>
							<div class="col-lg-3"><?php echo $res->BORNDATE;?></div>

							<div class="col-lg-3">Civil Status:</div>
							<div class="col-lg-3"><?php echo $res->CIVILSTATUS;?></div> 
							<div class="col-lg-3">Gender:</div>
							<div class="col-lg-3"><?php echo $res->SEX;?></div> 
						</div>
						<div class="col-lg-3 stretch">
							<img src="<?php echo web_root.'admin/person/'.$res->PHOTO;?>">
						</div>
					</div>
					<hr/>
					<div class="row"> 
						<div class="col-lg-9">
							<div class="col-lg-3">Location:</div>
							<div class="col-lg-3"><?php echo $res->LOCATION;?></div>
							<div class="col-lg-3">Died:</div>
							<div class="col-lg-3"><?php echo $res->DIEDDATE;?></div>  
							<div class="col-lg-3">Grave No.:</div>
							<div class="col-lg-3"><?php echo $res->GRAVENO;?></div>  
							<div class="col-lg-3">Year Burried.:</div>
							<div class="col-lg-3"><?php echo $Burried;?></div> 
						</div>
						<div class="col-lg-3 stretch">
							<img src="<?php echo web_root.'admin/person/'.$res->GRAVEPIC;?>">
						</div>
					</div>
				</div>
				<br/>



<!-- 
				// echo '<tr>';
				// echo '<td>'.$res->GRAVENO.'</td>';
				// // echo '<td>'.$res->LNAME.','.$res->FNAME.' '.$res->MNAME.'</td>';
				// echo '<td><a href="index.php?q=person&graveno='.$res->GRAVENO.'&name='.$res->FNAME.'&location='.$res->LOCATION.'&section='.$res->CATEGORIES.'">'. $res->FNAME.'</a></td>';
				// echo '<td>'.$res->BORNDATE.'</td>';
				// echo '<td>'.$res->DIEDDATE.'</td>';
				// echo '<td>'.$res->LOCATION.'</td>';
				// echo '<td>'.$age.'</td>';
				// echo '</tr>'; -->

<?php			
            }

		}else{
				echo '<tr>'; 
				echo '<td colspan="5" style="text-align:center">No Record Found!</td>'; 
				echo '</tr>'; 
		}
			  



		?>
		   
</div>


