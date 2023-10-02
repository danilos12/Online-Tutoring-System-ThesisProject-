<?php
include 'config.php';
include 'header.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <title>Lesson</title>
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
    <div class="flex  w-full h-full justify-center mt-5">
        <div class="w-1/2  h-1/2">
            <div class="flex items-center w-full h-32 ">
                <p class="text-4xl font-medium">Add Lesson</p>
            </div>
            <div class="w-full h-full border rounded-lg p-8">
                <form id="foo" method="POST" class="flex w-full h-full" enctype="multipart/form-data">
                    <div class="flex w-full flex-col  h-full  ">
                        <div class="w-full  flex space-x-2">
                            <p class="text-xl font-semibold mr-3 ">Subject Name:</p>
                            <input id="less" name="subject" type="text" class="border rounded border-gray-400" placeholder="Lesson Name">
                            <p class="text-xl font-semibold mr-3 ">Hourly Rate:</p>
                            <input id="hour" name="hour" type="text" class="border rounded border-gray-400" placeholder="₱">
                            
                            
                        </div>
                        
                        <div class="w-full  block rounded-lg  mt-12">
                            <p class="text-xl font-semibold ">Lesson Description</p>
                            <textarea id="descr" name="descri" id="message" rows="10" class="block  p-2.5 mt-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Your message..."></textarea>
                        </div>
                        <div class="block mt-16">
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="multiple_files">Upload your lesson(pdf,docx,ppt)</label>
                            <input id="filee" type="File" name="filee" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer  focus:outline-none  " id="multiple_files" multiple>
                        </div>
                        <div class="block mt-16">
                            <button id="submit" type="submit" name="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Submit</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        var submit1 = document.getElementById("submit");
        submit1.addEventListener("click", function(e) {
            e.preventDefault();
            var formData = new FormData();
            var imagefile = document.querySelector('#filee');
            formData.append("usF", imagefile.files[0]);


            var fname = document.getElementById("less").value;
            formData.append("usLess", fname);
            var lname = document.getElementById("descr").value;
            formData.append("usDesc", lname);
            var hourly = document.getElementById("hour").value;
            formData.append("usHourly", hourly);
            var url = "lesson2.php";

            if (fname == "" || lname == "" || hourly == "") {
                toastr.warning("Check if there are empty values", "Empty", { progressBar: true , closeButton: true });
                document.getElementById("foo").reset();

            } else {
                axios.post(url, formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })

                    .then(function(res) {
                        
                        document.getElementById("foo").reset();
                        toastr.success("You have successfully added subject <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {window.location.replace("./viewSub");}});
                

                    })
                    .catch(function(error) {
                        toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
                    })
            }
        });
    </script>

</body>

</html>