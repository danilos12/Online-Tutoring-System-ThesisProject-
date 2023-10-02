<?php
include 'config.php';
session_start();
    if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
        header("Location: ../login/index");
        die();
    }

    
    $name = mysqli_query($conn, "SELECT * FROM teacher WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");

    if (mysqli_num_rows($name) > 0) {
        $row1 = mysqli_fetch_assoc($name);
    }
    $mon = "M";
    $ran_id = rand(time(), 100000000);
    $q = mysqli_real_escape_string($conn, $row1['fname']);
    $w = mysqli_real_escape_string($conn, $row1['lname']);
    $e = mysqli_real_escape_string($conn, $row1['unique_id']);
    $sub = mysqli_real_escape_string($conn, $_POST['usLess']);
    $des = mysqli_real_escape_string($conn, $_POST['usDesc']);
    $hourly = mysqli_real_escape_string($conn, $_POST['usHourly']);
    $filet = rand(1000, 10000) . "-" . $_FILES["usF"]["name"];
    $tname = $_FILES["usF"]["tmp_name"];
    $uploads_dir = '../files';

    move_uploaded_file($tname, $uploads_dir . '/' . $filet);

    $sql = "INSERT into lesson(unique_id,description,fname,lname,subj,filee,datee,roomID,hourlyrate) VALUES('$e','$des','$q','$w','$sub','$filet',CURRENT_TIMESTAMP,'$ran_id','$hourly')";
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }

?>