<?php
include 'config.php';
include 'header.php';
$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query33 = mysqli_query($conn, "SELECT * FROM education WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");

$query1 = mysqli_query($conn, "SELECT * FROM approved WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query34 = mysqli_query($conn, "SELECT SUM(rate) as total_rate, COUNT(rate) as total_count FROM rating WHERE unique_id_tut = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query35 = mysqli_query($conn, "SELECT * FROM rating WHERE unique_id_tut = {$_SESSION['SESSION_EMAIL_TEACHER']}");
if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
}
if (mysqli_num_rows($query1) > 0) {
  $row1 = mysqli_fetch_assoc($query1);
}
if (mysqli_num_rows($query34) > 0) {
    $row3y = mysqli_fetch_assoc($query34);
    
    $total_rate = $row3y['total_rate'];
    $total_count = $row3y['total_count'];
    if($total_count >0){
     $average_rating = $total_rate/$total_count;
    }else{
    $average_rating = 0; 
    }
} else {
    $average_rating = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    <h3 class="text-gray-600 font-lg text-semibold leading-6">Teacher</h3>
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
                                <div class="px-4 py-2 font-semibold">Address</div>
                                <div class="px-4 py-2"><?php echo $row['cuAddress'] ?></div>
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
           <div class="bg-white p-3 shadow-lg rounded-sm border">

                                        <div class="grid grid-cols-2">
                                            
                                            <div>
                                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                                    <span clas="text-green-500">
                                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                            <path fill="#fff"
                                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                                        </svg>
                                                    </span>
                                                    <span class="tracking-wide">Ratings</span>
                                                </div>
                                                <ul class="list-inside space-y-2">
                                        <li>
                                            
                                            <div class="flex items-center">
    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
    <p class="ml-2 text-lg font-bold text-gray-900 "><?php echo number_format($average_rating, 1); ?></p>
    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full "></span>
    <p class="text-lg font-medium text-gray-900  "><?php echo $total_count; ?> reviews</p>
</div>
<hr class="h-px my-8 bg-gray-800 border-2 ">
                                        </li>
                                        <?php
                                        $qty = mysqli_query($conn, "SELECT * FROM rating WHERE unique_id_tut = {$id}");
                    if ($query35->num_rows > 0) {
                        $i = 0;
                        while ($rowi = $query35->fetch_assoc()) {
                            $i++;
                            $bal = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$rowi['unique_id_stud']}");
$ro = mysqli_fetch_assoc($bal);
                    ?>
                                        <li>
                                            
<article>
    <div class="flex items-center mb-4 space-x-4">

        <?php 
        
        echo '<img class="w-10 h-10 rounded-full" src="../files/' . $ro['img'] . '" alt="">' ?>
        <div class="space-y-1 font-medium ">
            <p><?php echo $rowi['fname_stud']." ".$rowi['lname_stud']; ?> <time datetime="2014-08-16 19:00" class="block text-sm text-gray-500 ">Student</time></p>
        </div>
    </div>
    <div class="flex items-center mb-1">
        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Rating star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
    <p class="ml-2 text-sm text-gray-900 "><?php echo $rowi['rate']; ?> / 5</p>
        <h3 class="ml-2 text-sm font-semibold text-gray-900"><?php echo $rowi['subject']; ?></h3>
    </div>
    <footer class="mb-5 text-sm text-gray-500 "><p>Reviewed on <time datetime="<?php echo $rowi['datee']; ?>"><?php echo date("F d, Y g:i:s A", strtotime($rowi['datee'])); ?></time></p></footer>
    <p class="mb-2 font-light text-gray-500 "><?php echo $rowi['comment']; ?></p>
    
    
</article>
<hr class="h-px my-8 bg-gray-300 border-0 ">
                                        </li>
<?php
                        }
                    } else {
                        echo '<p>No records found...</p>';
                    }
                    ?>
                                    </ul>
                                            </div>
                                        </div>

                                        <!-- End of Experience and education grid -->
                                    </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</body>
</html>