<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");

if (mysqli_num_rows($query) > 0) {
  $rowss2 = mysqli_fetch_assoc($query);
}
  
  $a1 = mysqli_real_escape_string($conn, $_POST['uExp']);
  $a2 = mysqli_real_escape_string($conn, $_POST['uStart']);
  $a3 = mysqli_real_escape_string($conn, $_POST['uEnd']);
  $unq = mysqli_real_escape_string($conn, $rowss2['unique_id']);
  $try = mysqli_query($conn, "INSERT into experience(unique_id,exp,start,end)
      VALUES('$unq','$a1','$a2','$a3')");

  if (mysqli_query($conn, $try)) {
    echo "success";
    
  } else {
    echo "error";
  }

$aa1 = mysqli_real_escape_string($conn, $_POST['uEdu']);
  $aa2 = mysqli_real_escape_string($conn, $_POST['uStart1']);
  $aa3 = mysqli_real_escape_string($conn, $_POST['uEnd1']);
  $unq2 = mysqli_real_escape_string($conn, $rowss2['unique_id']);
  $try2 = mysqli_query($conn, "INSERT into education(unique_id,edu,start,end)
      VALUES('$unq2','$aa1','$aa2','$aa3')");

  if (mysqli_query($conn, $try2)) {
    echo "success";
    
  } else {
    echo "error";
  }
?>