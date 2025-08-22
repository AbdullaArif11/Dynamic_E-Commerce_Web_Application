<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "online_fashion_store";
$con = new mysqli($servername, $username, $password, $db_name);
if($con->connect_error){
  die("Connection failed".$con->connect_error);
}else{
  echo "";
}
?>