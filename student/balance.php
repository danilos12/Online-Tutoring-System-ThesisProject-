
<?php
include 'config.php';

session_start();
if(isset($_POST['displaysend2'])){

   $val = $_SESSION['unique_id'];




   $query = mysqli_query($conn,"SELECT * FROM deposit WHERE unique_id ='$val'");
    $pasok = mysqli_fetch_assoc($query);
    $bals  = $pasok['balance'];

    echo '₱'.$bals.'';

    


}else{
   return false;
}
   ?>