<?php
include 'config.php';
include 'header.php';

if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
    header("Location: ../login/index");
    die();
}

$query = mysqli_query($conn, "SELECT * FROM times2 WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$queryWEW = mysqli_query($conn, "SELECT * FROM times2 WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$queryW = mysqli_query($conn, "SELECT * FROM paidSes WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$queryRe = mysqli_query($conn, "SELECT * FROM reqPay WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$queryEma = mysqli_query($conn, "SELECT * FROM tut_reg WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query12345 = mysqli_query($conn, "SELECT SUM(total) AS value_sum FROM paidSes WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");

if (mysqli_num_rows($query12345) > 0) {
    $row123 = mysqli_fetch_assoc($query12345);
}
if (mysqli_num_rows($queryWEW) > 0) {
    $gtt = mysqli_fetch_assoc($queryWEW);
}
if (mysqli_num_rows($queryEma) > 0) {
    $email2 = mysqli_fetch_assoc($queryEma);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <title>Session History</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body class="bg-gray-100">

  
  
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex items-center w-3/4 h-40 ">
          <p class="text-2xl ">Session History</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Student's Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subject
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Start Time
                    </th>
                    <th scope="col" class="py-3 px-6">
                        End Time
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Elapsed Time
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Hourly Rate
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Status
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            if($query->num_rows > 0){ $i=0; 
                while($row = $query->fetch_assoc()){ $i++; 
            ?>
                <tr class="bg-white border-b dark:border-gray-300 text-black">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $i; ?>
                    </th>
                    <td class="py-4 px-6">
                        <?php echo $row['fname']." ". $row['lname']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo $row['subject']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php 
                        $time = strtotime($row['start']);
                        echo date("g:i a", $time); ?>
                      
                    </td>
                    <td class="py-4 px-6">
                        <?php 
                        $time = strtotime($row['end']);
                        echo date("g:i a", $time); ?>
                      
                    </td>
                    <td class="py-4 px-6  justify-center">
                        <?php echo $row['elaps']; ?>
                      
                    </td>
                    <td class="py-4 px-6">
                        ₱<?php echo $row['hourly']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo $row['status']; ?>
                    </td>
                    <td class="py-4 px-6">
                        ₱<?php echo $row['cost']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo date("M j, Y", strtotime($row['datee'])); ?>
                       
                    </td>
                   
                    
                </tr>
                
                

                <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
            </tbody>
        </table>
        


    <!-- Modal 2 -->
    

    
<!--new mod  -->


    </div>
      
    </div>
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex items-center w-3/4 h-12 ">
          <p class="text-2xl ">Paid Approved Session</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Student's Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Subject
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>
                    
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            if($queryW->num_rows > 0){ $i=0; 
                while($row = $queryW->fetch_assoc()){ $i++; 
            ?>
                <tr class="bg-white border-b dark:border-gray-300 text-black">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $i; ?>
                    </th>
                    <td class="py-4 px-6">
                        <?php echo $row['studF']." ". $row['studL']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo $row['subject']; ?>
                    </td>
                    <td class="py-4 px-6">
                        ₱<?php echo $row['total']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo date("M j, Y", strtotime($row['datee'])); ?>
                      
                    </td>
                    
                   
                    
                </tr>
                
               

                <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
            </tbody>
        </table>
        


    <!-- Modal 2 -->
    
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="modal1-button">Request Payout</button>
    
<!--new mod  -->


    </div>
      
    </div>
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex items-center w-3/4 h-12 ">
          <p class="text-2xl ">My Request Payout</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Total
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>
                    
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            if($queryRe->num_rows > 0){ $i=0; 
                while($row = $queryRe->fetch_assoc()){ $i++; 
            ?>
                <tr class="bg-white border-b dark:border-gray-300 text-black">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $i; ?>
                    </th>
                    <td class="py-4 px-6">
                        <?php echo $row['email']; ?>
                    </td>
                    <td class="py-4 px-6">
                        ₱<?php echo $row['total']; ?>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo date("M j, Y", strtotime($row['datee'])); ?>
                      
                    </td>
                    
                   
                    
                </tr>
                
                

                <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
            </tbody>
        </table>
        


    <!-- Modal 2 -->
    

    
<!--new mod  -->


    </div>
      
    </div>
    
    <div id="modal1"
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Payout</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p>Do you want to request payout with a total of ₱<?php echo $row123['value_sum']; ?>?  <br><span class='my-font-size'>- you can only request with approved status</span><br></p>
      <input type="hidden" id="tot" name="tot" value="<?php echo $row123['value_sum']; ?>">
      <input type="hidden" id="unn1" name="unn1" value="<?php echo $email2['unique_id']; ?>">
<input type="hidden" id="ff" name="ff" value="<?php echo $email2['fname']; ?>">
<input type="hidden" id="ll" name="ll" value="<?php echo $email2['lname']; ?>">
<input type="hidden" id="em" name="em" value="<?php echo $email2['email']; ?>">
                <div class="flex justify-end pt-2">
                    <button id="yessPay" class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-600">Yes</button>
                    <button
                        class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Close</button>
                </div>
            </div>
        </div>
    </div>
<style>
.modal {
  transition: all 0.3s ease-out;
}

.modal-overlay {
  transition: all 0.3s ease-out;
}

.modal-container {
  transition: all 0.3s ease-out;
}

#modal-button:hover {
  cursor: pointer;
}

#modal-button:focus {
  outline: none;
}

.modal-open {
  pointer-events: auto;
  opacity: 1;
}

.modal-open .modal-overlay {
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-open .modal-container {
  transform: scale(1);
}

.modal-close {
  pointer-events: auto;
}

.modal-close:hover {
  cursor: pointer;
}

.modal-close:focus {
  outline: none;
}

.modal-close .modal-container {
  transform: scale(0.9);
}

.modal-close .modal-overlay {
  background-color: transparent;
}

.modal-close .modal {
  pointer-events: none;
  opacity: 0;
}
/* toastr */
 .my-font-size{
    font-size: 9px;
}
        .toast {
  background-color: #ffffff;
}
.toast-message {
  color: #000000; 
}
.toast-title {
  color: #000000; 
}

.toast-close-button {
  color: #8f8f8f;
}
.toast-close-button:hover {
  color: #000000;
}
#toast-container>.toast-warning {
background-image: url(XCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #ffc107;
}
.toast-warning .toast-progress {
  background-color: #ffc107;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-error {
background-image: url(XCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #dc3545;
}
.toast-error .toast-progress {
  background-color: #dc3545;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-success {
background-image: url(CheckCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #198754;
}
.toast-success .toast-progress {
  background-color: #198754;
  height: 4px;
  opacity: 100%;
}
#toast-container>.toast-info {
background-image: url(CheckCircle.svg)!important;
background-size: 24px 24px;
border-radius: 12px;
border-left: 6px solid #0dcaf0;
}
.toast-info .toast-progress {
  background-color: #0dcaf0;
  height: 4px;
  opacity: 100%;
}
.toast {
    width: 400px !important;
}
    </style>

<script>
    
const modal1 = document.getElementById('modal1');

const yaya = document.getElementById('yessPay');

const modal1Button = document.getElementById('modal1-button');

const closeButtons = document.querySelectorAll('.modal-close');

modal1Button.addEventListener('click', () => {
    $.ajax({
            type: "POST",
            url: "check.php",
            data: { unique_id: fc },
            success: function(result){
                if(result == "exists"){
                    $(modal1Button).attr("disabled", true);
                }else{
                    modal1.classList.add('modal-open');
                }
            }
        });

});



closeButtons.forEach(button => {
  button.addEventListener('click', () => {
    modal1.classList.remove('modal-open');
    
    
  });
});

let yeet = document.getElementById("tot").value;

let fc = document.getElementById("unn1").value;
let fna = document.getElementById("ff").value;
let lna = document.getElementById("ll").value;
let ema = document.getElementById("em").value;
yaya.addEventListener('click', function(e) {
  e.preventDefault();
if(!yeet) {
    toastr.error("There is no data ", "Error", { progressBar: true , closeButton: true});
    return;
}
  
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'req.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function() {
    if (xhr.status === 200) {
  toastr.success("You have successfully requested payout <br><span class='my-font-size'>- page will be reloaded after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {location.reload();}});
        modal1.classList.remove('modal-open');        

} else {
  toastr.error("Error ", "Error", { progressBar: true , closeButton: true});
}
  };
  xhr.send('tot=' + yeet  + '&tot3=' + fc + '&fnam=' + fna + '&lnam=' + lna + '&email=' + ema);
});


</script>

</body>
</html>