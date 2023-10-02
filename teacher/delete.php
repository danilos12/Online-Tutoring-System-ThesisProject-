<?php
include 'config.php';


$Ex_id = mysqli_real_escape_string($conn, $_POST['uIdd']);
    $delete = "DELETE from assessment WHERE unID=$Ex_id";
   
    $act = mysqli_query($conn, $delete);
    
?>