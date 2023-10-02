<?php

include 'config.php';


$elapsed_time = mysqli_real_escape_string($conn, $_POST['elapsed_time']);
$tf = mysqli_real_escape_string($conn, $_POST['tFname']);
$tl = mysqli_real_escape_string($conn, $_POST['tLname']);
$roomm = mysqli_real_escape_string($conn, $_POST['dan']);
$unn = mysqli_real_escape_string($conn, $_POST['unq1']);
$cost = mysqli_real_escape_string($conn, $_POST['cost']);
$unqS = mysqli_real_escape_string($conn, $_POST['unqStud']);
$ess = mysqli_real_escape_string($conn, $_POST['rer']);
$star = mysqli_real_escape_string($conn, $_POST['strt']);
$endd = mysqli_real_escape_string($conn, $_POST['endd']);
$newElap = mysqli_real_escape_string($conn, $_POST['tst']);
$sub = mysqli_real_escape_string($conn, $_POST['subj']);
$fn = mysqli_real_escape_string($conn, $_POST['fnam']);
$ln = mysqli_real_escape_string($conn, $_POST['lnam']);
$stat = "pending";
$sesId = rand(time(), 100000000);
$sql = "INSERT INTO times (elapsed_time,cost,hourly,tFname,tLname,roomID,unique_id,unique_id_stud,start,end,elaps,status,session_id,datee,subject,fname,lname) VALUES ('$elapsed_time','$cost','$ess','$tf','$tl','$roomm','$unn','$unqS','$star','$endd','$newElap','$stat','$sesId',CURRENT_TIMESTAMP,'$sub','$fn','$ln')";
$sql2 = "INSERT INTO times2 (elapsed_time,cost,hourly,tFname,tLname,roomID,unique_id,unique_id_stud,start,end,elaps,status,session_id,datee,subject,fname,lname) VALUES ('$elapsed_time','$cost','$ess','$tf','$tl','$roomm','$unn','$unqS','$star','$endd','$newElap','$stat','$sesId',CURRENT_TIMESTAMP,'$sub','$fn','$ln')";
if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (mysqli_query($conn, $sql2)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
}
?>