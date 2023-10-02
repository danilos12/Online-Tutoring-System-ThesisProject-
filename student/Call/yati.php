<?php 
include('config.php');
var_dump(file_get_contents('php://input'));
$a1 = mysqli_real_escape_string($conn, $_POST['usUnq']);
$a12 = mysqli_real_escape_string($conn, $_POST['usF2']);
$a13 = mysqli_real_escape_string($conn, $_POST['usL2']);
$room = mysqli_real_escape_string($conn, $_POST['uRoo']);
$filet1 = rand(1000, 10000) . "-" . $_FILES["yawas"]["name"];
$tname1 = $_FILES["yawas"]["tmp_name"];
$uploads_dir1 = './files/';
move_uploaded_file($tname1, $uploads_dir1 . '/' . $filet1);
$try = "INSERT into record(unique_id,fname,lname,filesht,date,roomID) VALUE('$a1','$a12','$a13','$filet1',CURRENT_TIMESTAMP,'$room')";
if (mysqli_query($conn, $try)) {
    echo "success";
    
} else {
    echo "error";
}
?>