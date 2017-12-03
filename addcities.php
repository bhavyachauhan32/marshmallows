<?php
include('functions.php');
$registered="false";
$redirect="false";
$error_mesage;
if(isset($_COOKIE['id'])){
if(isset($_POST['submit'])){

$city=$_POST['city'];
//define('GW_UPLOADPATH', 'images/');
//$target = GW_UPLOADPATH . $photo;
if(!empty($city)){

  $registered="true";
}
else{
  $error_mesage="your  passwords do not match";
}
}
if($registered=="true"){
  $connection=mysqli_connect($host,$user,$pass,$database);


  $run="INSERT INTO cities(city) VALUES('$city')";
  $connect=mysqli_query($connection,$run);
  ///move_uploaded_file($_FILES['photo']['tmp_name'], $target);
  $redirect="true";

}else{ echo "";}



?>

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

 	<title>Marshmellows</title>

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

 <body>
 	<?php include('sidebar.php'); ?>
 			<div class="content">
 				<div class="container-fluid">
<div class="jumbotron" >
          		<h4 class="title"><center>

             Add City</center></h4>

              <?php if($redirect=="true"){ ?>
                <div class="alert alert-info">
                <div class="container-fluid">
                  <div class="alert-icon">
                	<i class="material-icons">info_outline</i>
                  </div>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                	<span aria-hidden="true"><i class="material-icons">clear</i></span>
                  </button>
                  <b>Info alert:</b>

                                <?php
                                    echo " City Name : $city added Successfully.   ";
                                    /*echo '<a href="logout.php">Login</a>';*/
                                 ?></div>
                </div>


              <?php
              }else{ if(!empty($error_mesage)){
                ?>
                <div class="alert alert-danger">
<div class="container">
  <div class="alert-icon">
    <i class="material-icons">error_outline</i>
  </div>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="material-icons">clear</i></span>
  </button>
  <b>Error Alert:</b><?php echo $error_mesage;} ?>
        </div>
        <form method="post" action="<?php  echo $_SERVER['PHP_SELF'];?>">


              <div class="row">
                <div class="form-group">
                    <input type="text" type="text"  placeholder="<?php if(isset($city)){echo $city;}else{echo "city";}?>"  name="city" class="form-control" required/>
                </div>
              </div>
              <center>
              <input type="submit"  class="btn btn-primary "  name="submit" value="submit" >
</center>

              <?php }
              }?>
</form>


 			</div>

      </div>

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
<?php } ?>
