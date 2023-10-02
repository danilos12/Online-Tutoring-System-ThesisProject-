<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';
$post = file_get_contents('php://input') ?? $_POST;

// decode the JSON data
$post = json_decode($post, true);
$_POST = json_decode(array_keys($_POST)[0], true);
$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['unique_id']}");

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
  $try =  mysqli_query($conn,"UPDATE allusers SET gender = '{$a1}',contact = '{$a2}',bio = '{$a3}',bday = '{$a4}',cuAddress = '{$a5}',perAddress = '{$a6}',img = '{$filet1}' WHERE unique_id = {$_SESSION['unique_id']};");
    $try2 = mysqli_query($conn, "UPDATE users SET img = '{$filet1}' WHERE unique_id = {$_SESSION['unique_id']};");

  if ($try2) {
    echo "success";

  } else {
    echo "error";
  }

?>