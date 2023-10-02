<?php
include 'config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}

$bal = mysqli_query($conn, "SELECT * FROM deposit WHERE unique_id = {$_SESSION['unique_id']}");
$row = mysqli_fetch_assoc($bal);
$vakk = $row['balance'];
$response = array();

//if($vakk>=2500){
//$response['success'] = true;
//$response['message'] = 'Successfully Enrolled';
//$room = mysqli_real_escape_string($conn, $_POST['roomID1']);
$files = mysqli_real_escape_string($conn, $_POST['fileN']);
$unq = mysqli_real_escape_string($conn, $_POST['unq']);
$unq2 = mysqli_real_escape_string($conn, $_POST['unqStud']);
$fnme = mysqli_real_escape_string($conn, $_POST['fnme']);
$lnme = mysqli_real_escape_string($conn, $_POST['lnme']);
$sub = mysqli_real_escape_string($conn, $_POST['sub']);
$tF = mysqli_real_escape_string($conn, $_POST['tF']);
$tL = mysqli_real_escape_string($conn, $_POST['tL']);
$hourly = mysqli_real_escape_string($conn, $_POST['hourly']);

$earn = mysqli_real_escape_string($conn, $_POST['earn']);
$ran_id = rand(time(), 100000000);
$room = rand(time(), 100000000);
$sql = "INSERT into enrolled(unique_id,unique_id_stud,subject,fname,lname,datee,tFname,tLname,eID,roomID,hourlyrate,filee) 
    VALUES('$unq','$unq2','$sub','$fnme','$lnme',CURRENT_TIMESTAMP,'$tF','$tL','$ran_id','$room','$hourly','$files')";
if (mysqli_query($conn, $sql)) {
  
}
$new = $vakk - 2500;
$price = 2500;


$result1 = mysqli_query($conn, "SELECT SUM(earn) AS value_sum FROM lesson WHERE unique_id = '$unq'"); 
$rowq = mysqli_fetch_assoc($result1); 
$sum2 = $rowq['value_sum'];

$result12 = mysqli_query($conn, "SELECT SUM(totalE) AS value_sum2 FROM approved WHERE unique_id = '$unq'"); 
$rowq2 = mysqli_fetch_assoc($result12); 
$sum22 = $rowq2['value_sum2'];

$earning = $earn + $price;
$earning2 = $sum2 + $price;
$tot = $sum22 + $price;
//$sql = mysqli_query($conn, "UPDATE deposit SET balance = '{$new}' WHERE unique_id = {$_SESSION['unique_id']}");
//$sql22 = mysqli_query($conn, "UPDATE approved SET earnings = '{$earning2}' WHERE unique_id = '$unq'");
//$sql223 = mysqli_query($conn, "UPDATE approved SET totalE = '{$tot}' WHERE unique_id = '$unq'");
//$sql222 = mysqli_query($conn, "UPDATE lesson SET earn = '{$earning}' WHERE roomID = '$room'");
//}
//else{
  //$response['success'] = false;
  //$response['message'] = 'insufficient balance';
//}
//echo json_encode($response);

?>