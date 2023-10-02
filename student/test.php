<?php include 'config.php';

session_start();
$msg = "";



if(isset($_POST['myData'])){

    $obj = json_decode($_POST['myData']);

    $vals = $_SESSION['unique_id'];


    $query = mysqli_query($conn,"SELECT * FROM deposit WHERE unique_id='$vals'");
    $pasok = mysqli_fetch_assoc($query);
    $t1 = $pasok['balance'];
    $t2 = $pasok['total'];
    $total = $t1 + $obj;
    $tut = $t2 + $obj;
    $query2 = mysqli_query($conn, "UPDATE deposit SET balance='{$total}' WHERE unique_id='$vals'");
    $query2 = mysqli_query($conn, "UPDATE deposit SET total='{$tut}' WHERE unique_id='$vals'");
    $query23 = mysqli_query($conn, "UPDATE users SET money='{$tut}' WHERE unique_id='$vals'");
    $stats = "Success Deposit";

    $query2 = mysqli_query($conn,"SELECT * FROM trans_history WHERE unique_id='$vals'");
    $pasok2 = mysqli_fetch_assoc($query2);
    $no = $pasok2['trans_no']++;
    $query4 = mysqli_query($conn, "INSERT INTO trans_history (trans_no,amount,status,dates,unique_id) VALUES('$no','$obj','$stats',now(),'$vals')");



}


?>
