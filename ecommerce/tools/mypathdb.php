<?php
  $serverName = "localhost";
  $userName = "root";
  $password = "";
  $dbName = "ecommerce";

  $conn = mysqli_connect($serverName, $userName, $password, $dbName);

  if(!$conn){
    $data = array("error" => '3');
    die(json_encode($data));
  }


?>