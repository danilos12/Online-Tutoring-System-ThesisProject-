<?php
    session_start();
    include_once "config.php";
    $ya = $_SESSION['superhero'];
    
    $sql = "SELECT * FROM allusers WHERE unique_id = {$ya} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data2.php";
    }
    echo $output;
?>