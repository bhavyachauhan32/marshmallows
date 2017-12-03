<?php
include('functions.php');
$error_message="";
$forgot="false";

if(isset($_POST['submit'])){
$username=$_POST['username'];


if(!empty($username)){

$connection=mysqli_connect($host,$user,$pass,$database);
$query="SELECT * FROM nasco";
$run=mysqli_query($connection,$query);
while($work=mysqli_fetch_assoc($run)){
  if($work['username']==$username){
    $id=$work['id'];
    $forgot="true";
    $email_id=$work['email'];
      break;

}else{
  $error_message="Please Enter A valid Username";
}
}
$var="editprofile.php?id=$id";
mail($email_id,"Forgot Password",$var);


}else{

  $error_message="Please Enter A Username";
}
} ?>


<!doctype html>
<html lang="en">
<head>
 <meta charset="utf-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

 <title>Forgot Password</title>

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
   <div class="header header-filter" style="background-image: url('assets/img/city.jpg'); background-size: cover; background-position: top center;">
     <div class="container">
       <div class="row">
         <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
           <div class="card card-signup">


             <?php if($forgot=="true"){
?>               <div class="header header-primary text-center">
<?php
               echo "the mail has been sent to your account <br />";
                            echo"<a>".$var."</a>";
?></div><?php
             }else{


               ?>

               <div class="alert alert-danger">
    <div class="container-fluid">
	 <?php if($error_message){ ?>   <div class="alert-icon">
	    <i class="material-icons">error_outline</i>
	  </div>
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true"><i class="material-icons">clear</i></span>
	  </button>
      <?php  ?><b>Error Alert:</b><?php  echo "<b><h4>".$error_message."<b/></h4>"; }?>  </div>
</div>



             <form method="post" action="<?php  echo $_SERVER['PHP_SELF'];?>">

               <div class="header header-primary text-center">
                 <h4>Forgot Password</h4>
                   </div>
               <p class="text-divider"></p>
               <div class="content">

                 <div class="input-group">
                   <span class="input-group-addon">
                     <i class="material-icons">face</i>
                   </span>
                   <input type="text" class="form-control" placeholder="<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}else{echo "Username";}?>"  name="username"  >
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
               <div class="footer text-center">
                 <a href="forgotpassword.php" class="btn btn-simple btn-primary btn-lg" >Forgot Password ?</a>
               </div>
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

<?php mysqli_close($connection); ?>
