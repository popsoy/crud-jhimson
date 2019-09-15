<?php

include_once("config.php");
$username = $_GET['username'];
$password = $_GET['password'];

$result = mysqli_query($con,"SELECT * FROM users WHERE uusername = '$username' AND upassword = '$password'");

var_dump($result);
if($result->num_rows  > 0 ){
   header("Location: index.php");
}else{
  echo "wala";
}
?>
