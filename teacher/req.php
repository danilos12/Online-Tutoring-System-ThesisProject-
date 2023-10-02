<?php

include 'config.php';
session_start();
if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
  header("Location: ../login/index");
  die();
}
$rr = mysqli_real_escape_string($conn, $_POST['tot']);
$rr2 = mysqli_real_escape_string($conn, $_POST['tot3']);
$rr3 = mysqli_real_escape_string($conn, $_POST['fnam']);
$rr4 = mysqli_real_escape_string($conn, $_POST['lnam']);
$rr5 = mysqli_real_escape_string($conn, $_POST['email']);


    $sql = mysqli_query($conn, "INSERT into reqPay(unique_id,email,total,fname,lname)
      VALUES('$rr2','$rr5','$rr','$rr3','$rr4')");
      
$query = mysqli_query($conn, "DELETE FROM times2 WHERE unique_id = '$rr2' AND status != 'pending'");
$query = mysqli_query($conn, "DELETE FROM paidSes WHERE unique_id = '$rr2'");
?>