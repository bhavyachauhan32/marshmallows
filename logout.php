<?php
include('functions.php');
include('header.php')


 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php


if(isset($_COOKIE['id'])){

setcookie('id','',time()-3600,'/');
setcookie('username','',time()-3600,'/');
$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
header('Location: ' . $home_url);

}

     ?>

  </body>
</html>
