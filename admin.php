
  <?php
  if(!isset($_COOKIE['id'])){


    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
    header('Location: ' . $home_url);

  }else{
include('functions.php');
?>

<!doctype html>
 <html lang="en">
 <head>
 	<meta charset="utf-8" />
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

 	<title>Marshmallows</title>

 	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
     <meta name="viewport" content="width=device-width" />

     <!-- Bootstrap core CSS     -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

     <!--  Material Dashboard CSS    -->
     <link href="assets/css/material-dashboard.css" rel="stylesheet"/>

     <!--  CSS for Demo Purpose, don't include it in your project     -->
     <link href="assets/css/demo.css" rel="stylesheet" />

     <!--     Fonts and icons     -->
     <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
     <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
 </head>

 <body background="assets/img/travel.jpg">
<!-- <?php $connection=mysqli_connect($host,$user,$pass,$database);
$sql="SELECT * FROM cities";
$run=mysqli_query($connection,$sql);
 ?> -->
<?php include('sidebar.php'); ?>
 	
<?php } ?>
<br><br><br><br><br><br><br><br><br><br><br>
<center>
<h1>Welcome To Admin Panel </h1>
</center>
 		</div>
 	</div>

 </body>

 	<!--   Core JS Files   -->
 	<script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
 	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
 	<script src="assets/js/material.min.js" type="text/javascript"></script>

 	<!--  Charts Plugin -->
 	<script src="assets/js/chartist.min.js"></script>

 	<!--  Notifications Plugin    -->
 	<script src="assets/js/bootstrap-notify.js"></script>

 	<!--  Google Maps Plugin    -->
 	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

 	<!-- Material Dashboard javascript methods -->
 	<script src="assets/js/material-dashboard.js"></script>

 	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
 	<script src="assets/js/demo.js"></script>

 	<script type="text/javascript">
     	$(document).ready(function(){

 			// Javascript method's body can be found in assets/js/demos.js
         	demo.initDashboardPageCharts();

     	});
 	</script>

 </html>
