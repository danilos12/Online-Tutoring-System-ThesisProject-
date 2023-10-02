<?php
include('config.php');



session_start();
if (!isset($_SESSION['SESSION_EMAIL_ADMIN'])) {
    header("Location: ../login/index");
    die();
}
$query122 = mysqli_query($conn, "SELECT * FROM approved");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <link rel="stylesheet" href="../tailwind/output.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <title>Administrator</title>
</head>
<body>
<div class="absolute ">

<aside class="w-64 h-screen " aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-hidden  bg-gray-50 dark:bg-gray-800 h-screen">
    <a href="#" class="flex items-center pl-2.5 mb-5">
    <span class="text-2xl font-bold text-gray-600 transition-colors duration-300 dark:text-white hover:text-gray-700">OwlHub</span>
    </a>

    <ul class="pt-4 mt-4 h-1/2 border-gray-200 dark:border-gray-700  space-y-2 ">
        <li class="">
            <a href="./admin_2" class="flex items-center p-2  text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                </svg>
                <span class="ml-3">Dashboard</span>
            </a>

        </li>
        <li>
            <a href="./tutor" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Tutors</span>

            </a>
        </li>
        <li>
            <a href="./subjects" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Subjects</span>

            </a>
        </li>
        <li>
            <a href="studentt" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Students</span>
            </a>
        </li>
        <li>
            <a href="paym" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z"></path>
            </svg>

                <span class="flex-1 ml-3 whitespace-nowrap">Payments</span>
            </a>
        </li>

        </ul>

        <ul class="mt-24 h-1/2  space-y-2  border-gray-200 dark:border-gray-700  flex flex-col  justify-center">


            <li>
            <div class="flex items-center space-x-4">
                <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="">
                <div class="font-medium dark:text-white">
                    <div>Andre Dan Dayaganon</div>
                    <div class="text-sm text-gray-500 dark:text-gray-400">Administrator</div>
                </div>
</div>
            </li>
            <li>
            <a href="./logout2.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15M9 12l3 3m0 0l3-3m-3 3V2.25"></path>
            </svg>
                <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>

            </a>

            </li>
        </ul>

    </div>
</aside>
</div>
  <!--End Sidebarsssdasdasdas-->

    <div class="flex  w-full">


        <div class="w-full h-screen pl-64 ">
            <div class="bg-yellow-500 p-12 block">
                <div class="">
                <span class=" font-bold text-3xl">Welcome to Admin Dashboard</span>
                </div>
                <div class="pt-4">
                <span class=" font-bold text-base">Dashboard</span>
                </div>
            </div>
            <div class=" p-12 ">
                    <div class="w-full h-60 rounded-3xl bg-white drop-shadow-xl border flex p-12 pl-32">
                        <div class="h-80 w-80"><img src="./images/image-1.png" ></div>
                        <div class="p-6">
                        <span class="font-medium text-3xl "> Hello Admin</span>
                        <p class="font-normal pt-4 text-overflow-ellipsis"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla unde at aspernatur ad laudantium voluptatem debitis, non asperiores explicabo! Dolores ipsam laudantium sed perspiciatis illo fuga quia asperiores dignissimos aliquam.</p>
                        </div>

                    </div>
            <div class="flex justify-center p-12 space-x-4">
                    <div class="w-1/4 h-60 rounded-3xl bg-white drop-shadow-xl border flex flex-col ">

                        <div class="p-6">
                            <span class="font-medium text-3xl pt-3 pl-4">Students</span>
                            <p class="font-normal pt-2 pl-4 text-sm text-gray-400 w-3/4">These are the numbers of enrolled student</p>
                            <div class="w-full flex  items-center">
                                <span id="enrolls" class="font-medium text-3xl pt-3 pl-4"> </span>
                            </div>
                        </div>

                    </div>
                    <div class="w-1/4 h-60 rounded-3xl bg-white drop-shadow-xl border flex justify-center">

                        <div class="p-6">
                                <span class="font-medium text-3xl pt-3 pl-4">Tutors</span>
                                <p class="font-normal pt-2 pl-4 text-sm text-gray-400 w-3/4">These are the numbers of registered tutors</p>
                                <div class="w-full flex  items-center">
                                <span id="teacher" class="font-medium text-3xl pt-3 pl-4"></span>
                                </div>
                        </div>

                    </div>
                    <div class="w-1/4 h-60 rounded-3xl bg-white drop-shadow-xl  border flex justify-center">
                        <div class="p-6">
                            <span class="font-medium text-3xl pt-3 pl-4"> Total Lessons</span>
                            <p class="font-normal pt-2 pl-4 text-sm text-gray-400 w-3/4">These are the numbers of total lessons from tutors</p>
                            <div class="w-full flex  items-center">
                                <span id="lessons" class="font-medium text-3xl pt-3 pl-4"></span>
                            </div>
                        </div>


                    </div>


            </div>



        </div>






    </div>

<script src="./server.js"></script>
    <script>


        var url = "students.php";
        var url2 = "teachers.php";
        var url3 = "admins.php";
        var url4 = "lessons.php";

        //number of students
        axios.get(url)
        .then(response => {
            document.getElementById("enrolls").innerHTML = response.data;


        })
        .catch(error => {
            console.log(error);
        });
       //number of teachers
        axios.get(url2)
        .then(response => {
            document.getElementById("teacher").innerHTML = response.data;
            console.log(response.data);


        })
        .catch(error => {
            console.log(error);
        });
       //number of lessons
        axios.get(url4)
        .then(response => {
            document.getElementById("lessons").innerHTML = response.data;


        })
        .catch(error => {
            console.log(error);
        });
       //number of admins
        axios.get(url3)
        .then(response => {
            document.getElementById("admins").innerHTML = response.data;


        })
        .catch(error => {
            console.log(error);
        });


    </script>
</body>
</html>