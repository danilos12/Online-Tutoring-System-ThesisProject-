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

  $a1 = mysqli_real_escape_string($conn, $_POST['usGend']);
  $a2 = mysqli_real_escape_string($conn, $_POST['usCont']);
  $a3 = mysqli_real_escape_string($conn, $_POST['usBio']);
  $a4 = mysqli_real_escape_string($conn, $_POST['usBday']);
  $a5 = mysqli_real_escape_string($conn, $_POST['usCur']);
  $a6 = mysqli_real_escape_string($conn, $_POST['usPer']);
  $filet1 = rand(1000, 10000) . "-" . $_FILES["file1"]["name"];
    $tname1 = $_FILES["file1"]["tmp_name"];
    $uploads_dir1 = '../files/';
    move_uploaded_file($tname1, $uploads_dir1 . '/' . $filet1);
  $try = "UPDATE allusers SET gender = '{$a1}',contact = '{$a2}',bio = '{$a3}',bday = '{$a4}',cuAddress = '{$a5}',perAddress = '{$a6}',img = '{$filet1}' WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']};";
  $try2 = mysqli_query($conn, "UPDATE tut_reg SET img = '{$filet1}' WHERE unique_id = {$_SESSION['unique_id']};");
  if (mysqli_query($conn, $try)) {
    echo "success";

  } else {
    echo "error";
  }

?>