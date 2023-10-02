<?php
include 'config.php';
session_start();
    if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
        header("Location: ../login/index");
        die();
    }

    $thiss = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
    $thiss2 = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
    $thiss3 = mysqli_query($conn, "SELECT * FROM teacher WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
    if (mysqli_num_rows($thiss2) > 0) {
      $row1 = mysqli_fetch_assoc($thiss2);
    }
    if (mysqli_num_rows($thiss3) > 0) {
      $row2 = mysqli_fetch_assoc($thiss3);
    }
    if (mysqli_num_rows($thiss) > 0) {
      $row = mysqli_fetch_assoc($thiss);
    }
    
      $unq = mysqli_real_escape_string($conn, $row1['unique_id']);
      $te = mysqli_real_escape_string($conn, $row2['fname']);
      $te2 = mysqli_real_escape_string($conn, $row2['lname']);
      $unq2 = mysqli_real_escape_string($conn, $row['unique_id_stud']);
      $fnme = mysqli_real_escape_string($conn, $row['fname']);
      $lnme = mysqli_real_escape_string($conn, $row['lname']);
      $eID2 = mysqli_real_escape_string($conn, $_POST['uE']);
      $sub = mysqli_real_escape_string($conn, $_POST['u1']);
      $q = mysqli_real_escape_string($conn, $_POST['u2']);
      $w = mysqli_real_escape_string($conn, $_POST['u3']);
      $e = mysqli_real_escape_string($conn, $_POST['u4']);
      $r = mysqli_real_escape_string($conn, $_POST['u5']);
      $t = mysqli_real_escape_string($conn, $_POST['u6']);
      $y = mysqli_real_escape_string($conn, $_POST['u7']);
      $filet = rand(1000, 10000) . "-" . $_FILES["usF"]["name"];
    $tname = $_FILES["usF"]["tmp_name"];
    $uploads_dir = '../files';

    move_uploaded_file($tname, $uploads_dir . '/' . $filet);
    $ran_id = rand(time(), 100000000);
      $sql = mysqli_query($conn, "INSERT into assessment(unique_id,teFname,teLname,unique_id_stud,fname,lname,asses,q1,q2,q3,q4,q5,datee,eID,filee,descr,unID)
      VALUES('$unq','$te','$te2','$unq2','$fnme','$lnme','$sub','$q','$w','$e','$r','$t',CURRENT_TIMESTAMP,'$eID2','$filet','$y','$ran_id')");
    
   
  
?>