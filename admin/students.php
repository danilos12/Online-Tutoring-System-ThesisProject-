<?php
include('config.php');


    $sql = "SELECT COUNT(*) FROM users";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    echo $row[0];
?>
