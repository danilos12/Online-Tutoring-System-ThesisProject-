<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");

if (mysqli_num_rows($query) > 0) {
  $rowss2 = mysqli_fetch_assoc($query);
}
  $Ex_id = mysqli_real_escape_string($conn, $_POST['idTry']);
  $unqTe = mysqli_real_escape_string($conn, $_POST['uUnq']);
  $unqq = mysqli_real_escape_string($conn, $rowss2['unique_id']);
  $a1 = mysqli_real_escape_string($conn, $_POST['uAns1']);
  $a2 = mysqli_real_escape_string($conn, $_POST['uAns2']);
  $a3 = mysqli_real_escape_string($conn, $_POST['uAns3']);
  $a4 = mysqli_real_escape_string($conn, $_POST['uAns4']);
  $a5 = mysqli_real_escape_string($conn, $_POST['uAns5']);
  
  $filet = rand(1000, 10000) . "-" . $_FILES["usF"]["name"];
    $tname = $_FILES["usF"]["tmp_name"];
    $uploads_dir = '../files';

    move_uploaded_file($tname, $uploads_dir . '/' . $filet);
    
  $sqlW = "INSERT into assessment2(ansId,unique_id_teach,unique_id,ans1,ans2,ans3,ans4,ans5,filee) VALUE('$Ex_id','$unqTe','$unqq','$a1','$a2','$a3','$a4','$a5','$filet')";
  if (mysqli_query($conn, $sqlW)) {
    echo "success";
    $status = "Done";
    $sql = mysqli_query($conn, "UPDATE assessment SET result = '{$status}' WHERE eID='$Ex_id'");
  } else {
    echo "error";
  }

?>