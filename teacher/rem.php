<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';


  
  $a1 = mysqli_real_escape_string($conn, $_POST['id2']);
  
  $delete = "DELETE from experience WHERE id=$a1";

  if (mysqli_query($conn, $delete)) {
    echo "success";
    
  } else {
    echo "error";
  }

?>