<?php
session_start();

if (!isset($_SESSION['unique_id'])) {
    header("Location: .../welcome.php");
    die();
}
//update.php

$connect = new PDO('mysql:host=151.106.117.102;dbname=u465626092_login', 'u465626092_dolmercedes', 'Camer12345!');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE cal 
 SET title=:title, start_event=:start_event, end_event=:end_event 
 WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
