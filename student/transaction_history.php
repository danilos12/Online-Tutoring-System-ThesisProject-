
<?php
include 'config.php';
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}
if(isset($_POST['displaysend3'])){

$sql = "SELECT * FROM trans_history WHERE unique_id = '{$_SESSION['unique_id']}'";

   $results = mysqli_query($conn,$sql);
   if($results->num_rows > 0){


   while($row = $results->fetch_assoc()){


      echo "
      <tr class='flex w-full border-b lg:pl-0 md:pl-0 text-center'>


      <td class='p-5 w-1/4 '> ₱" .$row["amount"]. "</td>
      <td class='p-5 w-1/4'> " .$row["dates"]. "</td>
      <td class='p-5 w-1/4'> " .$row["status"]. "</td>




      </tr>
      ";





}

}else{
return false;
}}else{
   return false;
}
   ?>