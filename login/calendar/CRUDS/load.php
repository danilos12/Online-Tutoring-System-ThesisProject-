<?php
session_start();


if (!isset($_SESSION['unique_id'])) {
    header("Location: .../welcome.php");
    die();
}


$connect = new PDO('mysql:host=151.106.117.102;dbname=u465626092_login', 'u465626092_dolmercedes', 'Camer12345!');

$data = array();


$query = "SELECT * FROM cal WHERE email='{$_SESSION['unique_id']}'";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchALL();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'email'   => $row["email"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
