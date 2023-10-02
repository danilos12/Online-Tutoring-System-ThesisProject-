<?php
include 'config.php';
include 'headercopy.php';

if (!isset($_SESSION['unique_id'])) {
    header("Location: ../login/index");
    die();
}
$query = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id_stud = {$_SESSION['unique_id']}");
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <title>set schedule</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>

<body>
    <style>
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
<div class="max-w-md mx-auto">
<div class="p-6 bg-gray-200 rounded-lg shadow-lg">
  <h2 class="text-xl font-bold mb-4">Schedule</h2>
  <form>
      <input type="hidden" id="eID1" name="eID1" value="<?php echo $id; ?>">
    <label class="block font-bold mb-2">Day:</label>
    
<button id="dropdownSearchButton" data-dropdown-toggle="dropdownSearch" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Select Day <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

<!-- Dropdown menu -->
<div id="dropdownSearch" class="z-10 hidden bg-white rounded shadow w-60 ">
    <div class="p-3">
      
      
    </div>
    <ul class="h-48 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownSearchButton">
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-11" type="checkbox" value="Monday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-11" class="w-full ml-2 text-sm font-medium text-black rounded ">Monday</label>
        </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
            <input id="checkbox-item-12" type="checkbox" value="Tuesday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="checkbox-item-12" class="w-full ml-2 text-sm font-medium text-black rounded ">Tuesday</label>
          </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-13" type="checkbox" value="Wednesday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-13" class="w-full ml-2 text-sm font-medium text-black rounded ">Wednesday</label>
        </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-14" type="checkbox" value="Thursday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-14" class="w-full ml-2 text-sm font-medium text-black rounded">Thursday</label>
        </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-15" type="checkbox" value="Friday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-15" class="w-full ml-2 text-sm font-medium text-black rounded ">Friday</label>
        </div>
      </li>
      <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-16" type="checkbox" value="Saturday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-16" class="w-full ml-2 text-sm font-medium text-black rounded ">Saturday</label>
        </div>
      </li>
            <li>
        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
          <input id="checkbox-item-17" type="checkbox" value="Sunday" name="days" class="days w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
          <label for="checkbox-item-17" class="w-full ml-2 text-sm font-medium text-black rounded ">Sunday</label>
        </div>
      </li>
    </ul>
</div>


    <label class="block font-bold mt-4 mb-2">Start Time:</label>
    <input id="sta" type="time" class="w-full p-2 rounded-lg shadow-sm">

    <label class="block font-bold mt-4 mb-2">End Time:</label>
    <input id="end" type="time" class="w-full p-2 rounded-lg shadow-sm">
    <button id="subb" type="submit" class="mt-4 p-2 rounded-lg bg-blue-500 text-dark shadow-lg hover:bg-blue-600">Submit</button>
  </form>
</div>

</div>
<script>



 
    var submit1 = document.getElementById("subb");
    submit1.addEventListener("click", function(e) {
      e.preventDefault();
      var formData = new FormData();
      var eID = document.getElementById("eID1").value;
      
      var q1 = document.getElementById("sta").value;
      var q2 = document.getElementById("end").value;
      
      formData.append("uE", eID);
    
      formData.append("u2", q1);
      formData.append("u3", q2);
      
      
      var markedCheckbox = document.getElementsByName('days');  
var gh = [];
for (var checkbox of markedCheckbox) {  
    if (checkbox.checked)  
      gh.push(checkbox.value); 
}  
formData.append("dayys", gh); 
      var url = "sche.php";

      axios.post(url, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        .then(function(res) {
//console.log(gh);
          toastr.success("You have successfully set your schedule <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true, onHidden: function() {window.location.replace("./viewSub");}});
          
          
        })
        .catch(function(error) {
          toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
        })
    });
  </script>


</div>
</body>
</html>