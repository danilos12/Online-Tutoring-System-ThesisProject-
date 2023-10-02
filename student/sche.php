<?php
include 'config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}
$q = mysqli_real_escape_string($conn, $_POST['uE']);

$dy = mysqli_real_escape_string($conn, $_POST['dayys']);
$e = mysqli_real_escape_string($conn, $_POST['u2']);
$r = mysqli_real_escape_string($conn, $_POST['u3']);
$sql = mysqli_query($conn, "UPDATE enrolled SET sched = '{$dy}' WHERE eID = '$q'");


$sql = mysqli_query($conn, "UPDATE enrolled SET start = '{$e}' WHERE eID = '$q'");
$sql = mysqli_query($conn, "UPDATE enrolled SET end = '{$r}' WHERE eID = '$q'");
?>