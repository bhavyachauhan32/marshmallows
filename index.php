<?php
include('functions.php');
$registered="false";

if(isset($_POST['submit'])){
echo "fefe";
if(!isset($_COOKIE['username'])){
  echo "lol";

    $username=$_POST['username'];

  $password=$_POST['password'];
  $confirm_password=$_POST['confirm_password'];
  if((!empty($username)) && (!empty($password)) && (!empty($confirm_password))){
    if($password==$confirm_password){
          $connection=mysqli_connect($host,$user,$pass,$database);
          $run="SELECT * FROM admin";
          $result=mysqli_query($connection,$run);
          if($result){echo "good";}

          while($going=mysqli_fetch_assoc($result)){

            if($going['password']==$password){
              echo "its going";
              $useid=$going['id'];
              $usena=$going['username'];
              setcookie('username',$usena, time()+31536000,'/');
              setcookie('id',$useid ,time()+31536000,'/');

                    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin.php';
                    header('Location: ' . $home_url);


    }


  }



    }

  }
}
}else{}
  if(!empty($_COOKIE['id'])){


      $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin.php';
      header('Location: ' . $home_url);
  }
else{




/**if(isset($_COOKIE['username'])){

  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);

}else{
**/



 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="utf-8" />
 	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

 	<title>Login-VirtualRJ Admin Portal</title>

 	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

 	<!--     Fonts and icons     -->
 	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

 	<!-- CSS Files -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
     <link href="assets/css/material-kit.css" rel="stylesheet"/>

 </head>

 <body class="signup-page">

     <div class="wrapper">
 		<div class="header header-filter" style="background-image: url('assets/img/night-city-lights-wallpaper-5.jpg'); background-size: cover; background-position: top center;">
 			<div class="container">
 				<div class="row">
 					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
 						<div class="card card-signup">
              <form method="post" action="<?php  echo $_SERVER['PHP_SELF'];?>">

              	<div class="header header-primary text-center">
 									<h4>Login-VirtualRJ Admin Portal</h4>
 										</div>
 								<p class="text-divider"></p>
 								<div class="content">

 									<div class="input-group">
 										<span class="input-group-addon">
 											<i class="material-icons">face</i>
 										</span>
 										<input type="text" class="form-control" placeholder="<?php if(isset($username)){echo $username;}else{echo "Username";}?>"  name="username" required>
 									</div>

                  <div class="input-group">
										<span class="input-group-addon">
                      <i class="material-icons">lock_outline</i>
										</span>
										<input type="password" class="form-control" placeholder="<?php if(isset($password)){echo $password;}else{ echo "Password";}?>"  name="password" required>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password"  name="confirm_password" placeholder="<?php if(isset($confirm_password)){echo $confirm_password;}else{echo "Confirm Password";}?>" class="form-control" required/>
									</div>

 									<!-- If you want to add a checkbox to this form, uncomment this code

 									<div class="checkbox">
 										<label>
 											<input type="checkbox" name="optionsCheckboxes" checked>
 											Subscribe to newsletter
 										</label>
 									</div> -->
                  <div class="row">
                        <button type="submit" name="submit" class="btn  btn-primary">Submit</button><br />
                  </div>
 								</div>
 								<!-- <div class="footer text-center">
 									<a href="forgotpassword.php" class="btn btn-simple btn-primary btn-lg" >Forgot Password ?</a>
 								</div> -->
 							</form>
 						</div>
 					</div>
 				</div>
 			</div>


 		</div>

     </div>


 </body>
 	<!--   Core JS Files   -->
 	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
 	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
 	<script src="assets/js/material.min.js"></script>

 	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
 	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

 	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
 	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

 	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
 	<script src="assets/js/material-kit.js" type="text/javascript"></script>

 </html>

<?php } ?>
<!-- <?php mysqli_close($connection); ?> -->
