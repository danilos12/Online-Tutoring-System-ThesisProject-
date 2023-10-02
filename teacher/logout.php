<?php
    session_start();
    if(isset($_SESSION['SESSION_EMAIL_TEACHER'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE teacher SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            $sql = mysqli_query($conn, "UPDATE allusers SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login/index");
            }
        }else{
            header("location: welcome");
        }
    }else{  
        header("location: ../login/index");
    }
?>