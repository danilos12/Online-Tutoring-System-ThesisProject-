<?php include('db.php');
$query1 = mysqli_query($connection, "SELECT * FROM pay");
$row = mysqli_fetch_assoc($query1);

$sqlEventList1 = "SELECT * FROM transaction_history";
$resultEventList2 = $connection->query($sqlEventList1);



$msg = "";
if(isset($_POST['myData'])){
    $obj = json_decode($_POST['myData']);
    $query = mysqli_query($connection, "SELECT * FROM pay");
  
    
    $query = mysqli_query($connection, "SELECT * FROM pay");
            
    if ($query) {
        $msg = "<div class='alert alert-success'>Thanks.</div>";
    }
   

    $query = mysqli_query($connection, "SELECT * FROM pay WHERE id='5'");
    $user = mysqli_fetch_array($query);
    $t1 = $user['balance'];
    $total = $t1 + $obj;
    $query2 = mysqli_query($connection, "UPDATE pay SET balance='{$total}' WHERE id='5'");
    $query3 = mysqli_query($connection, "SELECT * FROM pay WHERE id='2'");
    $query4 = mysqli_query($connection, "INSERT INTO transaction_history (id,amount,names,dates) VALUES(NULL,'$obj','Andre Dan Dayaganon',now())");
 
  
  
    header("Location: index2.php");
    
    
   }

?>
