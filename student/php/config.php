<?php
  $hostname = "localhost";
  $username = "u438892067_username3421";
  $password = "Dolmer1234";
  $dbname = "u438892067_testing";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
