
<?php
include 'config.php';

$post = file_get_contents('php://input') ?? $_POST;

// decode the JSON data
$post = json_decode($post, true);

  $_POST = json_decode(array_keys($_POST)[0], true);
  $emparray = array();
if(isset($_POST['decsss'])){
    $ids = $_POST['decsss'];

$sql = "SELECT * FROM enrolled WHERE unique_id_stud = $ids";
   $results = mysqli_query($conn,$sql);


   while($row = $results->fetch_assoc()){

      $emparray[] = $row;

  }

echo json_encode($emparray);

}


   ?>