<?php
include 'config.php';
    $unique_id = $_POST['unique_id'];
    //connect to the database
    $query = "SELECT * FROM reqPay WHERE unique_id = '$unique_id'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        echo "exists";
    }
?>