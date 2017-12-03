<?php
include('functions.php');
$registered="false";
$redirect="false";
$error_mesage;
$connection=mysqli_connect($host,$user,$pass,$database);
if(isset($_COOKIE['id'])){
if(isset($_POST['submit'])){
$sql = "SELECT city_id FROM cities where city='".$_POST['city']."'";
$rs = mysqli_query($connection,$sql) or die(mysqli_error()); 
$row = mysqli_fetch_row($rs);
$city_id = $row[0];
$places=$_POST['places'];
//$city=$_POST['city'];
$history=$_POST['history'];
/*$city=$_POST['city'];*/


if(!empty($places)){

  $registered="true";

}
else{
  $error_mesage="you can't enter place";
}
}
if($registered=="true"){


	$target_dir_vr = "VR/";
$target_file_vr = $target_dir_vr . basename($_FILES["vr"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file_vr,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["vr"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file_vr)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["vr"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["vr"]["tmp_name"], $target_file_vr)) {
        //echo "The file ". basename( $_FILES["vr"]["name"]). " has been uploaded.";
    } else {
        //echo "Sorry, there was an error uploading your file.";
    }

    ////////////////////////////////////
}



$target_dir_pic = "places/";
$target_file_pic = $target_dir_pic . basename($_FILES["pictures"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file_pic,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["pictures"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file_pic)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["pictures"]["size"] > 5000000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["pictures"]["tmp_name"], $target_file_pic)) {
        //echo "The file ". basename( $_FILES["pictures"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

  $run="INSERT INTO places(place,city_id,history,VR,pics) VALUES('$places','$city_id','$history','$target_file_vr','$target_file_pic')";
  $connect=mysqli_query($connection,$run);

  ///////////////////////////////////
  
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

              Places List</center></h4>

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
                                    echo " Place Name : $places added Successfully.   ";
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
        <form method="post" action="<?php  echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">


              <div class="row">
                <div class="form-group">
                    <input type="text" placeholder="<?php if(isset($place)){echo $place;}else{echo "Place Name";}?>"  name="places" class="form-control" required/>
                </div>
              </div>
              <div class="row">
        <div class="form-group">
        
      <?php 
      $connection=mysqli_connect($host,$user,$pass,$database);
$sql = "SELECT city_id,city FROM cities";
$rs = mysqli_query($connection,$sql) or die(mysql_error()); ?>
<select class="form-control" placeholder="<?php if(isset($city)){echo $city;}else{echo "city";}?>"  name="city">
<?php
while($row = mysqli_fetch_array($rs)){
echo "<option value='".$row["city"]."' name='".$row["city"]."'>".$row["city"]."</option>";
}mysqli_free_result($rs); ?>
</select>
    </div>
    </div>
              <div class="row">
        <div class="form-group">
          <textarea id="textarea1" class="form-control" placeholder="<?php if(isset($history)){echo $history;}else{echo "history";}?>"  name="history" required></textarea>
        </div>
      </div>
<center>
      <div class="row">
        <div class="file-field input-field">
      <div class="btn">
        <span>VR Images</span>
        <input type="file" class="file-path validate" placeholder="<?php if(isset($vr)){echo $vr;}else{echo "vr";}?>" name="vr" required>
      </div>
      
      <div class="btn">
        <span>Simple Images</span>
        <input type="file" class="file-path validate" placeholder="<?php if(isset($pictures)){echo $pictures;}else{echo "pictures";}?>"  name="pictures" required>
      </div>
      </div>
      </div>
      
      <!-- <div class="row">
        <div class="file-field input-field">
      
      </div>
      </div> -->

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
