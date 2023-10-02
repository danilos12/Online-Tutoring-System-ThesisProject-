<?php
session_start();

if (!isset($_SESSION['unique_id'])) {
    header("Location: .../welcome.php");
    die();
}

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=151.106.117.102;dbname=u465626092_login', 'u465626092_dolmercedes', 'Camer12345!');
 $query = "
 DELETE from cal WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>