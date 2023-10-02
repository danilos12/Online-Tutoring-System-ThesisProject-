<?php 



ob_start();


if(!isset($_SESSION)) {
    session_start();
}

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "paypal";

$connection = mysqli_connect($hostname, $username, $password, $dbname); 


?>