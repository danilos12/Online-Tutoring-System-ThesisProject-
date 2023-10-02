<?php
include 'config.php';
include 'headercopy.php';

    if (!isset($_SESSION['unique_id'])) {
        header("Location: ../login/index");
        die();
    }
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM times WHERE roomID = '$id'");
$queryRec = mysqli_query($conn, "SELECT * FROM record WHERE roomID = '$id'");

$query12345 = mysqli_query($conn, "SELECT SUM(cost) AS value_sum FROM times WHERE roomID = '$id' AND status != 'pending'");
if (mysqli_num_rows($query12345) > 0) {
    $row123 = mysqli_fetch_assoc($query12345);
}
$bal = mysqli_query($conn, "SELECT * FROM deposit WHERE unique_id = {$_SESSION['unique_id']}");
$ro = mysqli_fetch_assoc($bal);
$vakk = $ro['balance'];

$f = mysqli_query($conn, "SELECT * FROM enrolled WHERE roomID = '$id'");
$ff = mysqli_fetch_assoc($f);
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
<body>

  
  
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex-col items-center w-3/4 h-32 ">
            <p class="text-2xl ">Subject: <?php echo $ff['subject']; ?></p>
          <p class="text-2xl ">Session History</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tutor's Name
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
                    <th scope="col" class="py-3 px-6">
                        Validate
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
                        <?php echo $row['tFname']." ". $row['tLname']; ?>
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
                    <td class="py-4 px-6">
                        <button class="modal2-button-row bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-sessionid="<?php echo $row['session_id']; ?>" id="modal2-button">Approve</button>
                        
                    </td>
                    
                </tr>
                
                
<input type="hidden" id="unn1" name="unn1" value="<?php echo $row['unique_id']; ?>">
<input type="hidden" id="ssb" name="ssb" value="<?php echo $row['subject']; ?>">
<input type="hidden" id="stuF" name="stuF" value="<?php echo $row['fname']; ?>">
<input type="hidden" id="stuL" name="stuL" value="<?php echo $row['lname']; ?>">
                <?php 
                } 
            }else{ 
                echo '<tr><td colspan="6">No records found...</td></tr>'; 
            } 
            ?>
            </tbody>
        </table>
        


    <!-- Modal 2 -->
    
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="modal1-button">Pay</button>
    
<!--new mod  -->


    </div>
      
    </div>
    
    
    <div class=" mx-auto my-auto  w-4/5  ">
    
  
      <div class="overflow-x-auto relative w-full mt-8 ">
        <div class="text flex items-center w-3/4 h-auto h-12">
          <p class="text-2xl ">Recorded Session</p>
        
        </div>
        <table class="w-full shadow-md  text-sm text-left text-gray-500 dark:text-gray-400 border rounded-lg">
            <thead class="text-xs text-black uppercase bg-gray-200 dark:border-gray-300 dark:text-black ">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        #
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Recording
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            if($queryRec->num_rows > 0){ $i=0; 
                while($row = $queryRec->fetch_assoc()){ $i++; 
            ?>
                <tr class="bg-white border-b dark:border-gray-300 text-black">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $i; ?>
                    </th>
                    <td class="py-4 px-6">
                        <a href="./Call/files/<?php echo $row["filesht"]; ?>" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo $row["filesht"]; ?></a>
                    </td>
                    <td class="py-4 px-6">
                        <?php echo date("M j, Y", strtotime($row['date'])); ?>
                      
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
        
<div id="modal1"
        class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Payment</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <p>Do you want to proceed payment with a total of ₱<?php echo $row123['value_sum']; ?>?</p>
      <input type="hidden" id="tot" name="tot" value="<?php echo $row123['value_sum']; ?>">
        <input type="hidden" id="rooom" name="rooom" value="<?php echo $id; ?>">
                <div class="flex justify-end pt-2">
                    <button id="yessPay" class=" px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-600">Yes</button>
                    <button
                        class="modal-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Close</button>
                </div>
            </div>
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
  modal1.classList.add('modal-open');
});

const modal2Buttons = document.getElementsByClassName('modal2-button-row');

for (let i = 0; i < modal2Buttons.length; i++) {
  modal2Buttons[i].addEventListener('click', () => {
    
    const sessionId = event.target.dataset.sessionid;
    //console.log(sessionId);
    
    let xhr = new XMLHttpRequest();
  xhr.open('POST', 'sesApp.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function() {
    if (xhr.status === 200) {
  toastr.success("You have approve the session time <br><span class='my-font-size'>- page will be reloaded after this notification</span><br>", "Approved", { progressBar: true , closeButton: true , onHidden: function() {location.reload();}});
                

}  else {
  toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true});
}
  };
  xhr.send('sesid=' + sessionId);
  });
}

closeButtons.forEach(button => {
  button.addEventListener('click', () => {
    modal1.classList.remove('modal-open');
    
    
  });
});

let yeet = document.getElementById("tot").value;
let rmID = document.getElementById("rooom").value;
let fc = document.getElementById("unn1").value;
let ssbj = document.getElementById("ssb").value;
let stuF = document.getElementById("stuF").value;
let stuL = document.getElementById("stuL").value;
yaya.addEventListener('click', function(e) {
  e.preventDefault();

  
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'pay.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function() {
    if (xhr.status === 200) {
  toastr.success("Payment successfully <br><span class='my-font-size'>- page will be reloaded after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {location.reload();}});
        modal1.classList.remove('modal-open');        

} else if (xhr.status === 402) {
  toastr.warning("You dont have enough balance", "Insufficient Balance", { progressBar: true , closeButton: true});
                
} else {
  toastr.error("Only approved session can you pay", "Error", { progressBar: true , closeButton: true});
}
  };
  xhr.send('tot=' + yeet + '&tot2=' + rmID + '&tot3=' + fc + '&subje=' + ssbj + '&stuFF=' + stuF + '&stuLL=' + stuL);
});


</script>

</body>
</html>