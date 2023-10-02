<?php
include 'config.php';


$post = file_get_contents('php://input') ?? $_POST;

// decode the JSON data
$post = json_decode($post, true);

  $_POST = json_decode(array_keys($_POST)[0], true);
  $emparray = array();
  if(isset($_POST['decsss'])){
    $ids = $_POST['decsss'];

    $query2 = "SELECT * FROM allusers WHERE unique_id=$ids";
    $result2 = mysqli_query($conn, $query2);

    while($row = $result2->fetch_assoc()){

       $emparray[] = $row;

    }
    echo json_encode($emparray);
















  }



?>