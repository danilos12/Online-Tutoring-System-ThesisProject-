<?php
include 'config.php';
include 'header.php';
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Assessment</title>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
  <script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body class="bg-gray-100">

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




  <div class="flex justify-center items-center w-full h-12 mt-8">
    <div class="d w-2/4">
      <p class="text-2xl font-medium">Add Assessment</p>
    </div>
  </div>
  <div class="flex w-full justify-center">
    <form id="foo" method="POST" action="" class="block w-1/2  mt-12">
        <input type="hidden" id="eID1" name="eID1" value="<?php echo $id; ?>">
      <div class=" flex  ">
        <p class="text-base font-semibold ">Assessment Name:</p>
        <input id="ass" name="assess" type="text" class="border border-gray-700 ml-2">
      </div>
      <div class="block space-y-4 mt-12" id="newElementId">
        <label for="message" class="block mb-2  text-sm font-medium text-gray-900 dark:text-gray-400">Write Your Questions in the box</label>

        <textarea id="q1" name="question" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Question 1..."></textarea>
        <textarea id="q2" name="question2" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Question 2..."></textarea>
        <textarea id="q3" name="question3" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Question 3..."></textarea>
        <textarea id="q4" name="question4" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Question 4..."></textarea>
        <textarea id="q5" name="question5" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Question 5..."></textarea>
       <div class="py-6">
         <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="desc">File Description</label>
        <textarea  name="description" id="message2" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add short description about your file"></textarea>
         
         
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input1" type="File" for="file_input">
</div> 
         
        <button id="yes" name="submit" type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Submit Assessment</button>

      </div>

    </form>

  </div>
  <script>
    var submit1 = document.getElementById("yes");
    submit1.addEventListener("click", function(e) {
      e.preventDefault();
      var formData = new FormData();
      var imagefile = document.querySelector('#file_input1');
        formData.append("usF", imagefile.files[0]);
      var eID = document.getElementById("eID1").value;
      var ass = document.getElementById("ass").value;
      var q1 = document.getElementById("q1").value;
      var q2 = document.getElementById("q2").value;
      var q3 = document.getElementById("q3").value;
      var q4 = document.getElementById("q4").value;
      var q5 = document.getElementById("q5").value;
      var q6 = document.getElementById("message2").value;
      formData.append("uE", eID);
      formData.append("u1", ass);
      formData.append("u2", q1);
      formData.append("u3", q2);
      formData.append("u4", q3);
      formData.append("u5", q4);
      formData.append("u6", q5);
      formData.append("u7", q6);
      var url = "add.php";

      axios.post(url, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })
        .then(function(res) {

           document.getElementById("foo").reset();
          toastr.success("Successfully added assessment <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {window.location.replace("./viewSub");}});
                
        
        })
        .catch(function(error) {
          toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
        })
    });
  </script>



  <script type="text/JavaScript">
    function createNewElement() {
       
        var txtNewInputBox = document.createElement('div');
      
     
        txtNewInputBox.innerHTML = "<label for='message' class='block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400'>Write Your Questions in the box</label> <form method='POST'><textarea name='question' id='message' rows='4' class='block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='Your answer here...'></textarea></form>";
      
   
        document.getElementById("newElementId").appendChild(txtNewInputBox);
      }
      </script>

</body>

</html>