<?php
include('config.php');
$post = file_get_contents('php://input') ?? $_POST;

// decode the JSON data
$post = json_decode($post, true);

  $_POST = json_decode(array_keys($_POST)[0], true);
  if(isset($_POST['maks'])){
    $ids = $_POST['maks'];


    $sql = "SELECT COUNT(*) FROM lesson WHERE unique_id =$ids";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    echo $row[0];
  }
?>
