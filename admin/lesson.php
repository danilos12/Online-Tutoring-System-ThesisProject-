<?php
include 'config.php';

$emparray = array();




$query2 = "SELECT unique_id,fname,lname,subj,filee,description  FROM lesson GROUP BY unique_id";
$result2 = mysqli_query($conn, $query2);

while($row = $result2->fetch_assoc()){

   $emparray[] = $row;

}
echo json_encode($emparray);
?>
