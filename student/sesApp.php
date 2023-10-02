<?php

include 'config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}
$rr = mysqli_real_escape_string($conn, $_POST['sesid']);
$stats = "approved";
$sql = mysqli_query($conn, "UPDATE times SET status = '{$stats}' WHERE session_id = '$rr'");
$sql2 = mysqli_query($conn, "UPDATE times2 SET status = '{$stats}' WHERE session_id = '$rr'");
?>