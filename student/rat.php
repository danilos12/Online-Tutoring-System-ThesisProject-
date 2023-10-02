<?php

include 'config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}
$q1 = mysqli_real_escape_string($conn, $_POST['rate']);
$q2 = mysqli_real_escape_string($conn, $_POST['romy']);
$q3 = mysqli_real_escape_string($conn, $_POST['fnam']);
$q4 = mysqli_real_escape_string($conn, $_POST['lnam']);
$q5 = mysqli_real_escape_string($conn, $_POST['subj']);
$q6 = mysqli_real_escape_string($conn, $_POST['unqq']);
$q7 = mysqli_real_escape_string($conn, $_POST['msgRate']);
$q8 = mysqli_real_escape_string($conn, $_POST['unqStud']);
$query = mysqli_query($conn, "INSERT INTO rating (unique_id_tut,rate,rID,fname_stud,lname_stud,datee,subject,comment,unique_id_stud) VALUES('$q6','$q1','$q2','$q3','$q4',CURRENT_TIMESTAMP,'$q5','$q7','$q8')");
?>