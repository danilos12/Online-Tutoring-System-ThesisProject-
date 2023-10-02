<?php
session_start();

if (!isset($_SESSION['unique_id'])) {
    header("Location: .../welcome.php");
    die();
}
//insert.php

$connect = new PDO('mysql:host=151.106.117.102;dbname=u465626092_login', 'u465626092_dolmercedes', 'Camer12345!');

if(isset($_POST["title"]))
{

$stmt = "$_SESSION[unique_id]";
$query = "
 INSERT INTO cal 
 (email, title, start_event, end_event) 
 VALUES ('$stmt',:title, :start_event, :end_event)
 ";

 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>
