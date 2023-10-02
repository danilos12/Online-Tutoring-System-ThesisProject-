<?php

include 'config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}
$rr = mysqli_real_escape_string($conn, $_POST['tot']);
$room = mysqli_real_escape_string($conn, $_POST['tot2']);
$uny = mysqli_real_escape_string($conn, $_POST['tot3']);
$subj = mysqli_real_escape_string($conn, $_POST['subje']);
$fn = mysqli_real_escape_string($conn, $_POST['stuFF']);
$ln= mysqli_real_escape_string($conn, $_POST['stuLL']);
$bal = mysqli_query($conn, "SELECT * FROM deposit WHERE unique_id = {$_SESSION['unique_id']}");
$row = mysqli_fetch_assoc($bal);
$vakk = $row['balance'];
$new = $vakk - $rr;
if($vakk < $rr){
    http_response_code(402);
}else{
    $new = $vakk - $rr;

$bal2 = mysqli_query($conn, "SELECT * FROM tut_reg WHERE unique_id = '$uny'");
$row2 = mysqli_fetch_assoc($bal2);
$vakk2 = $row2['earnings'];
$vakk23 = $row2['totalE'];
$new22 = $vakk2 + $rr;
$new223 = $vakk23 + $rr;

$stats = "Payment to tutor";
$vals = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "UPDATE deposit SET balance = '{$new}' WHERE unique_id = {$_SESSION['unique_id']}");
$sql22 = mysqli_query($conn, "UPDATE tut_reg SET earnings = '{$new22}' WHERE unique_id = '$uny'");
$sql223 = mysqli_query($conn, "UPDATE tut_reg SET totalE = '{$new223}' WHERE unique_id = '$uny'");

$query4 = mysqli_query($conn, "INSERT INTO trans_history (amount,status,dates,unique_id) VALUES('$rr','$stats',now(),'$vals')");
$query444 = mysqli_query($conn, "INSERT INTO paidSes (unique_id,roomID,subject,total,studF,studL) VALUES('$uny','$room','$subj','$rr','$fn','$ln')");
$delete = "DELETE from times WHERE unique_id_stud=$vals AND status != 'pending'";

$act = mysqli_query($conn, $delete);

}


?>