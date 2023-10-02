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
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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

                            <?php echo '<img class="h-auto w-full mx-auto" src="../files/' . $row['img'] . '" alt="">' ?>
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl leading-8 my-1"><?php echo $row['fname'], " ", $row['lname'] ?></h1>
                        <h3 class="text-gray-600 font-lg text-semibold leading-6">Teacher</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6"><?php echo $row['bio'] ?></p>
                        <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span class="bg-indigo-800 py-1 px-2 rounded text-white text-sm"><?php echo $row['status'] ?></span></span>
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
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">About</span>
                            <div class="w-full flex justify-end">

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

                    <div class="bg-white p-3 shadow-lg rounded-sm border">
                        <div class="w-full flex justify-end">

                        </div>
                        <div class="grid grid-cols-2">
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Experience</span>
                                </div>

                                <?php
                                if ($query34->num_rows > 0) {
                                    $i = 0;
                                    while ($rowse1 = $query34->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <form class="yatis" id="foo" method="POST">

                                            <div class="text-teal-600"><?php echo $rowse1['exp']; ?></div>
                                            <div class="text-gray-500 text-xs"><?php echo $rowse1['start']; ?>&nbsp;-&nbsp;<?php echo $rowse1['end']; ?></div>
                                            <input type="hidden" id="id2" name="id2" value="<?php echo $rowse1["id"]; ?>">
                                            <button id="de" type="button" class="del text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5  text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>

                                        </form>
                                <?php
                                    }
                                } else {
                                }
                                ?>
                            </div>
                            <div>
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Education</span>
                                </div>
                                <?php
                                if ($query33->num_rows > 0) {
                                    $i = 0;
                                    while ($rowse = $query33->fetch_assoc()) {
                                        $i++;
                                ?>
                                        <form class="yatis" id="foo2" method="POST">

                                            <div class="text-teal-600"><?php echo $rowse['edu']; ?></div>
                                            <div class="text-gray-500 text-xs"><?php echo $rowse['start']; ?>&nbsp;-&nbsp;<?php echo $rowse['end']; ?></div>
                                            <input type="hidden" id="id22" name="id22" value="<?php echo $rowse["id"]; ?>">
                                            <button id="de" type="button" class="del2 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5  text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>

                                        </form>
                                <?php
                                    }
                                } else {
                                }
                                ?>
                            </div>
                        </div>
                        <div class="w-full flex justify-end">
                            <a class="text-gray-600 font-medium" href="./profile">Cancel</a>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
      $(".del").click(function(e) {
            e.preventDefault();
            var formData = new FormData($(this).closest('form')[0]);



            var url = "rem.php";

            axios.post(url, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(res) {

                    alert("Deleted.\nPress ok to go back");
                    window.location.replace("./profile");

                })
                .catch(function(error) {
                    alert("error");
                })
        })
    });
    </script>
    <script>
        $(document).ready(function() {
      $(".del2").click(function(e) {
            e.preventDefault();
            var formData = new FormData($(this).closest('form')[0]);



            var url = "rem2.php";

            axios.post(url, formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(res) {

                    alert("Deleted.\nPress ok to go back");
                    window.location.replace("./profile");

                })
                .catch(function(error) {
                    alert("error");
                })
        })
    });
    </script>
</body>

</html>