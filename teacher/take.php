<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';

  $Ex_id = mysqli_real_escape_string($conn, $_POST['idTry']);
  $scoree = mysqli_real_escape_string($conn, $_POST['uScore']);
 
    $status = "Done";
    $sql = mysqli_query($conn, "UPDATE assessment SET score = '{$scoree}' WHERE eID='$Ex_id'");


?>