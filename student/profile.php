<?php
include 'config.php';
include 'headercopy.php';
$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['unique_id']}");

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
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Profile</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>
<body>
    <!-- component -->
<style>
    :root {
        --main-color: #4a76a8;
    }

    .bg-main-color {
        background-color: var(--main-color);
    }

    .text-main-color {
        color: var(--main-color);
    }

    .border-main-color {
        border-color: var(--main-color);
    }
</style>




<div class="bg-white">
 <div class="w-full text-white bg-main-color">

    </div>


    <div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2 border shadow-lg ">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-blue-900 ">
                    <div class="image overflow-hidden">

                            <?php echo '<img class="h-auto w-full mx-auto" src="../files/'. $row['img'] .'" alt="">' ?>
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?php echo $row['fname'], " ", $row['lname'] ?></h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Student</h3>
                    <p class="text-sm text-gray-500 hover:text-gray-600 leading-6"><?php echo $row['bio'] ?></p>
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Status</span>
                            <span class="ml-auto"><span
                                    class="bg-indigo-800 py-1 px-2 rounded text-white text-sm"><?php echo $row['status'] ?></span></span>
                        </li>

                    </ul>
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
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                        <div class="w-full flex justify-end">
                            <a class="text-gray-600" href="editprof" >Edit Profile</a>
                        </div>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid md:grid-cols-2 text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">First Name</div>
                                <div class="px-4 py-2"><?php echo $row['fname'] ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Last Name</div>
                                <div class="px-4 py-2"><?php echo $row['lname'] ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Gender</div>
                                <div class="px-4 py-2"><?php echo $row['gender'] ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Contact No.</div>
                                <div class="px-4 py-2"><?php echo $row['contact'] ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Current Address</div>
                                <div class="px-4 py-2"><?php echo $row['cuAddress'] ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                <div class="px-4 py-2"><?php echo $row['perAddress'] ?></div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email.</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Birthday</div>
                                <div class="px-4 py-2"><?php echo $row['bday'] ?></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Experience and education -->

                    <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
<script>

</script>
</body>
</html>