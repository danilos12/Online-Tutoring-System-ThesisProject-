
<?php
include 'config.php';
include 'headercopy.php';

$id = $_GET['id'];
$_SESSION['superhero'] = $_GET['id'];
$sql2 = "select * from  allusers where unique_id='$id'";
$query33 = mysqli_query($conn, "SELECT * FROM approved WHERE unique_id = {$id}");
$query34 = mysqli_query($conn, "SELECT SUM(rate) as total_rate, COUNT(rate) as total_count FROM rating WHERE unique_id_tut = {$id}");
$query35 = mysqli_query($conn, "SELECT * FROM rating WHERE unique_id_tut = {$id}");
$qry2 = mysqli_query($conn, $sql2);
if (mysqli_num_rows($qry2) > 0) {
    $row3 = mysqli_fetch_assoc($qry2);
    
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
if (mysqli_num_rows($qry2) == 0) {
    $yourURL = "./search";
    echo "<script>document.getElementsByTagName('BODY')[0].style.display = 'none';</script>";
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('No data of this person')
    window.location.href='$yourURL';
    </SCRIPT>");
?>

<?php
} else {
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
        
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <title>Tutor's Profile</title>
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




        <div id="yawa" class="bg-white">
            <div class="w-full text-white bg-main-color">

            </div>


            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2 border shadow-lg ">
                        <!-- Profile Card -->
                        <div class="bg-white p-3 border-t-4 border-blue-900 ">
                            <div class="image overflow-hidden">

                                <?php echo '<img class="h-auto w-full mx-auto" src="../files/' . $row3['img'] . '" alt="">' ?>
                            </div>
                            <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?php echo $row3['fname'], " ", $row3['lname'] ?></h1>
                            <h3 class="text-gray-600 font-lg text-semibold leading-6">Tutor</h3>
                            <p class="text-sm text-gray-500 hover:text-gray-600 leading-6"><?php echo $row3['bio'] ?></p>
                            <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto"><span class="bg-indigo-800 py-1 px-2 rounded text-white text-sm"><?php echo $row3['status'] ?></span></span>
                                </li>

                            </ul>
                            <div>
                                <a href="#" id="heyss" onclick="myopen()" class=" fixed bottom-10 right-0 h-14 w-16 items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                                    <svg class="w-10 h-10 text-black" fill="none" stroke="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                    </svg>

                                </a>
                            </div>
                            <div class="wrapper">
                                <section class="users" id="chat-area" style="display: none;">
                                    <header id="heads" class="heads" onclick="minimize()">
                                        <a href="#" class="back-icon"><img src="./photo/—Pngtree—vector back icon_4190818.png" alt="" class="heys"></a>
                                        <div class="content">
                                            <?php
                                            $sql = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['unique_id']}");
                                            if (mysqli_num_rows($sql) > 0) {
                                                $row = mysqli_fetch_assoc($sql);
                                            }
                                            ?>

                                        </div>

                                    </header>
                                    <div class="search">
                                        <span class="text">Chat Tutor</span>
                                        <input type="text" placeholder="Enter name to search...">
                                        <button><i class="fas fa-search"></i></button>
                                    </div>
                                    <div class="users-list">

                                    </div>
                                </section>

                            </div>
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

                            </div>
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">First Name</div>
                                        <div class="px-4 py-2"><?php echo $row3['fname'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Last Name</div>
                                        <div class="px-4 py-2"><?php echo $row3['lname'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Gender</div>
                                        <div class="px-4 py-2"><?php echo $row3['gender'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Contact No.</div>
                                        <div class="px-4 py-2"><?php echo $row3['contact'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Current Address</div>
                                        <div class="px-4 py-2"><?php echo $row3['cuAddress'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Permanant Address</div>
                                        <div class="px-4 py-2"><?php echo $row3['perAddress'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Email.</div>
                                        <div class="px-4 py-2">
                                            <a class="text-blue-800" href="mailto:<?php echo $row3['email'] ?>"><?php echo $row3['email'] ?></a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Birthday</div>
                                        <div class="px-4 py-2"><?php echo $row3['bday'] ?></div>
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
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
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
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="javascript/chat2.js"></script>
        <script src="javascript/users2.js"></script>
        <script src="src/mini-event-calendar.min.js"></script>
        <script>
            const setup = () => {
                return {
                    isSidebarOpen: false,
                }
            }

            function myopen() {

                var a = document.getElementById('chat-area');
                var b = document.getElementById('heyss');
                a.style.display = "block";
                b.style.display = "none";
            }

            function minimize() {
                var a = document.getElementById('chat-area');
                var b = document.getElementById('heyss');
                a.style.display = "none";
                b.style.display = "flex";
            }
        </script>
    </body>

    </html>
<?php
}
?>