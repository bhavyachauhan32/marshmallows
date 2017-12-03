<?php
include('functions.php');

if(isset($_COOKIE['id'])){

if(isset($_GET['id'])){
  $id=$_GET['id'];
  echo $id;
  $connection=mysqli_connect($host,$user,$pass,$database);
if($connection){echo "good";}
  $sql="DELETE  FROM cities WHERE city_id='$id'";
  $run=mysqli_query($connection,$sql);
  if($run){
    $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/cities.php';
    header('Location: ' . $home_url);

  }
}

}else{

  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
  header('Location: ' . $home_url);

}
 ?>
