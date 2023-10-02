
<?php
include 'config.php';

$emparray = array();
$sql = 'SELECT * FROM reqPay';
   $results = mysqli_query($conn,$sql);


   while($row = $results->fetch_assoc()){

      $emparray[] = $row;

  }

echo json_encode($emparray);




   ?>