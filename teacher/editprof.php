<?php
include 'config.php';
include 'header.php';
$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query33 = mysqli_query($conn, "SELECT * FROM education WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query34 = mysqli_query($conn, "SELECT * FROM experience WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Edit Profile</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    <form id="foo"method="POST">
        <div class="bg-white">
            <div class="w-full text-white bg-main-color">

            </div>


            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2 border shadow-lg ">
                        <!-- Profile Card -->
                        <div class="space-y-4 bg-white p-3 border-t-4 border-blue-900 ">

                            <div class="flex justify-center items-center w-full">
                                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100  ">
                                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>


                            <textarea id="bio" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Edit your description"></textarea>



                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>

                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div class="bg-white p-3 shadow-lg rounded-sm border">
                            <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">About</span>
                                <div class="w-full flex justify-end">
                                    <a class="text-gray-600" href="profile">Cancel</a>
                                </div>
                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">

                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold flex items-center">Gender</div>
                                        <div class="px-4 py-2 flex   ">

                                            <legend class="sr-only">Countries</legend>

                                            <select class="border rounded border-gray-400 space-y-2" id="gender" required="true">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>

                                            </select>



                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold flex items-center">Contact No.</div>
                                        <div class="px-4 py-2"><input id="cont" class="text-black rounded-md border border-slate-400 h-7" type="text"></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold flex items-center">Address</div>
                                        <div class="px-4 py-2"><input id="cur" class="text-black rounded-md border border-slate-400 h-7" type="text"></div>
                                    </div>


                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold flex items-center">Birthday</div>
                                        <div class="px-4 py-2">


                                            <div class="relative">
                                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                                <input id="bday" datepicker="" type="text" class="bg-gray-50 border border-slate-400 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 h-8 pl-10 p-2.5  datepicker-input" placeholder="Select date">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
<div class="w-full flex justify-end">
                <button id="yes" type="submit" name="submit" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                </div>
                        </div>
                        <!-- End of about section -->

                        <div class="my-4"></div>

                        <!-- Experience and education -->
                        
                        <!-- End of profile tab -->
                    </div>
                </div>
                
            </div>
        </div>

    </form>
    <script>
        var submit1 = document.getElementById("yes");
        submit1.addEventListener("click", function(e) {
            e.preventDefault();
            var formData = new FormData();

            var gender = document.getElementById("gender").value;
            var cont = document.getElementById("cont").value;
            var bio = document.getElementById("bio").value;
            var bday = document.getElementById("bday").value;
            var cur = document.getElementById("cur").value;

            formData.append("usGend", gender);
            formData.append("usCont", cont);
            formData.append("usBio", bio);
            formData.append("usBday", bday);
            formData.append("usCur", cur);
  
            var imagefile1 = document.getElementById('dropzone-file');
            formData.append("file1", imagefile1.files[0]);
            var url = "ed.php";

            axios.post(url, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(res) {

                   
                    document.getElementById("foo").reset();
                   
                    toastr.success("Profile updated <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {window.location.replace("./profile");}});
                
                })
                .catch(function(error) {
                    toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
                })
        });



    </script>
</body>

</html>