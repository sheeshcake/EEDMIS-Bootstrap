<?php
	include "controller/connect.php";
  	use Carbon\Carbon;
?>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>  
<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (MONTHLY)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> ₱
                      	<?php
                      		$sql = "SELECT date_paid, SUM(total_bill) as total FROM market_payment WHERE date_paid >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                      		$result = mysqli_query($conn, $sql);
                      		$total = 0;
                      		while($data = mysqli_fetch_assoc($result)){
                      			$total += $data['total'];
                      		}
                      		echo $total;
                      	?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (WEEKLEY)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      	<?php
                      		$sql = "SELECT date_paid, SUM(total_bill) as total FROM market_payment WHERE date_paid between DATE_FORMAT(CURDATE() ,'%Y-%m-01') AND CURDATE()";
                      		$result = mysqli_query($conn, $sql);
                      		$total = 0;
                      		while($data = mysqli_fetch_assoc($result)){
                      			$total += $data['total'];
                      		}
                      		echo $total;
                      	?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Tenants</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                      	<?php
                      		$sql = "SELECT * FROM market_tenant";
                      		$result = mysqli_query($conn, $sql);
                      		echo mysqli_num_rows($result) . " " ;
                      	?>
                      	Tenants Registered
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                      	Pending
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $sql = "SELECT * FROM market_payment WHERE total_payment=0";
                          $result = mysqli_query($conn, $sql);
                          echo mysqli_num_rows($result) . " " ;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
				<div class="chart-area" id="myAreaChart">
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
<?php
  	$sql = "SELECT EXTRACT(DAY FROM date_paid) as day,EXTRACT(MONTH FROM date_paid) as month, EXTRACT(YEAR FROM date_paid) as year, SUM(total_bill) as total FROM market_payment WHERE total_payment > 0 GROUP BY month,year ORDER BY year DESC, month DESC";
  	$result = mysqli_query($conn, $sql);
 ?>
<script>
	// var ctx = document.getElementById('myAreaChart').getContext('2d');
	window.onload = function () {
	var chart2 = new CanvasJS.Chart("myAreaChart",{
        title: {
            text: "Reports"               
        },
        axisX:{      
            valueFormatString: "DD-MMM" ,
            labelAngle: -50
        },
        axisY: {
          valueFormatString: "#,###"
      },

      data: [
      {        
        type: "area",
        color: "rgba(0,75,141,0.7)",
        dataPoints: [
        <?php
        	while($data = mysqli_fetch_assoc($result)){
        		$year = $data['year'];
        		$month = $data['month']-1;
        		$day = $data['day'];
        		$val = $data['total'];
        		echo "{ x: new Date($year,$month,$day),y:$val},";
        	}
        ?>
        ]
    }
    
    ]
});
	chart2.render();
}
	// var chart = new Chart(ctx, {
	//     type: 'line',
	//     data: {
	//         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
	//         datasets: [{
	//             label: 'Total Earinings',
	//             backgroundColor: 'rgb(255, 99, 132)',
	//             borderColor: 'rgb(255, 99, 132)',
	//             data: [<?php   	
	//             	while($data = mysqli_fetch_assoc($result)){
 //  					$data = $data['total'];
 //  					echo $data;
 //  					echo ",";
 //  					}
 //  					?>]
	//         }]
	//     },

	//     // Configuration options go here
	//     options: {}
	// });
</script>