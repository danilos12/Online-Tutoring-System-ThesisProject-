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
    <link rel="stylesheet" href="../tailwind/tails.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
<!--toaster scripts and links (start)-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!--toaster scripts and links (end)-->




    <title>Administrator</title>
</head>
<body>


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
.my-font-size{
   font-size: 9px;
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
  background-color: #ff0019;
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
            <a href="./studentt" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
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
                        <a href="./admin_2">
                        <span class=" font-bold text-base">Dashboard</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./tutor">
                        <span class=" font-bold text-base">Tutor</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./tutor">
                        <span class=" font-bold text-base">Subjects</span>
                        </a>
                    </div>
            </div>
            <div class="p-6 flex w-full justify-center">
                    <div class="w-full h-60 rounded-3xl bg-white drop-shadow-xl border flex  pl-32">
                                <div class=" h-80 w-80"><img src="./images/image-02.png" ></div>
                                <div class="p-12">
                                    <span class="font-medium text-3xl ">Subjects Information</span>
                                    <p class="font-normal pt-4"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla unde at aspernatur ad laudantium voluptatem debitis, non asperiores explicabo! Dolores ipsam laudantium sed perspiciatis illo fuga quia asperiores dignissimos aliquam.</p>
                                </div>
                    </div>
            </div>

        <div class=" max-h-max w-full flex items-center justify-center p-8 pt-2 overflow-hidden">

            <table class=" w-3/4 h-full text-sm text-gray-500 drop-shadow-xl dark:text-gray-400 text-left rounded-lg">
                <thead class="bg-gray-200 h-full text-xs flex  w-full text-gray-900 uppercase rounded-lg pl-32">
                    <tr class="flex w-full   mt-4 ">
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Tutor Name
                        </th>

                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Total Subject
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            View Subject
                        </th>

                    </tr>
                </thead>
                <tbody id="infos" class="custom-scrollbar block items-center justify-between overflow-y-scroll overflow-x-hidden w-full scroll-smooth" style="height: 38.5vh;" >








        </tbody>
    </table>



            </div>




        </div>






    </div>



    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg drop-shadow-lg border w-44  ">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">

                    <li>
                        <a href="#" class="block px-4 py-2 text-green-500 font-bold hover:bg-gray-100 border-b">Approve</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 text-red-500 font-bold hover:bg-gray-100 border-b">Decline</a>
                    </li>

                    </ul>
                </div>



<!-- modal start -->

<div class="modal  opacity-0 pointer-events-none  fixed w-full h-full top-0 left-0 flex items-center justify-center overflow-y-hidden ">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-100"></div>

            <div class="flex modal-container bg-white w-1/2 h-1/2 p-6  rounded-lg drop-shadow-2xl z-50 overflow-y-scroll custom-scrollbar">

            <div class="modal-content block w-full   text-left  p-3">

                <div class="flex w-full  pb-3">
                    <div class=" w-full ">
                    <p class="text-4xl font-bold">Tutor's Subjects</p>
                    </div>
                    <div class="">
                        <div class="modal-close cursor-pointer w-full flex items-end  z-50">
                            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex w-full justify-center  space-y-5">

                        <div id="parent" class="w-full block space-y-4 p-12">
                                <div id="pics" class="w-full flex justify-center">

                                </div>
                                <div class="w-full flex flex-col items-center ">

                                   <P id="name" class="text-xl font-bold">Andre Dan Dayaganon</P>

                                    <P class="text-base font-normal">Tutor</P>

                                </div>

                        </div>





                    </div>




            </div>
        </div>
    </div>







<!-- modal end -->

    <script>






var modal = document.querySelector(".modal");
//modal script start kengkong
$(".dolmer").click(function(e) {
              modal.classList.add("modal-open");
              e.preventDefault();

          });




        $(".modal-close").click(function(e) {
              modal.classList.remove("modal-open");
              e.preventDefault();

          });

        $(".et").click(function(e) {
            e.preventDefault();
              modal.classList.remove("modal-open");


          });


          window.addEventListener("click", function (event) {
              if (event.target == modal) {
                  modal.classList.remove("modal-open");
              }
          });
//modal script end kengkong
        var url = "lesson.php";




axios.get(url)
.then(response => {
    var data1 = response.data;


    var tableContent = document.getElementById("infos");
    var tutname = document.getElementById("name");
    var mama = document.getElementById("parent");
    var profss = document.getElementById("pics");





    response.data.forEach(dats => {
        const row = document.createElement('tr');
        row.setAttribute("id", "dels"+dats.unique_id);
        row.className += "bg-white border-b flex w-full items-center text-left h-16 pl-32";
        tableContent.appendChild(row);
        const cell = document.createElement('td');
        const cell4 = document.createElement("td");
        const cell6 = document.createElement("td");
        cell4.setAttribute("id", dats.unique_id);
        const divs = document.createElement("div");
        const buts = document.createElement("button");
        buts.setAttribute("id", "views"+dats.unique_id);
        cell.className = "w-1/4 text-base text-center pl-4 truncate";
        cell4.className = "w-1/4 text-center pl-6 truncate";

        cell6.className = "w-1/4 text-center pl-8  align-middle  block";
        divs.className = "relative left-2 ";
        buts.className = "text-white bg-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2";

        cell.innerText = dats.fname + " " + dats.lname;


        var url2 = "lescount.php";
        var maks = dats.unique_id;

        axios.post(url2,JSON.stringify({
            maks:maks
        }))
        .then(response => {

            cell4.innerText = response.data;
                }).catch(error => {
            console.log(error);
        });
        buts.innerHTML = "View";

        divs.appendChild(buts);
        cell6.appendChild(divs);
        row.appendChild(cell);
        row.appendChild(cell4);
        row.appendChild(cell6);



        var prfl =  document.createElement("img");


prfl.className = "w-40 h-40 border rounded-full object-cover";


        $("#views"+dats.unique_id).click(function(e) {

            var decsss = dats.unique_id;
                modal.classList.add("modal-open");

                tutname.innerText = dats.fname + " " + dats.lname;

                    axios.post('prof.php',JSON.stringify({
                        decsss:decsss
                    }))
                    .then(response => {
                        prfl.setAttribute("src", "../files/"+response.data[0].img);

                        profss.appendChild(prfl);
                            console.log(response.data[0].img);


                    })
                    .catch(error => {
                        console.log(error);
                    });






                profss.appendChild(prfl);
                console.log("Open");


                    var decsss = dats.unique_id;
                    axios.post('lesdisplay.php', JSON.stringify({
                        decsss: decsss
                    }))
                    .then(response => {

                        response.data.forEach(dams => {
                                console.log(dams.unique_id);
                    //modal appends chingchengchongchong(START)
                        //create element
                    const subparent = document.createElement('div');
                    const subparent2 = document.createElement('div');
                    const subparent3 = document.createElement('div');
                    const child = document.createElement('div');
                    const child2 = document.createElement('div');
                    const ps1 = document.createElement('p');
                    const ps2 = document.createElement('p');
                    const ps3 = document.createElement('p');
                    const ps4 = document.createElement('p');
                    const ps5 = document.createElement('p');
                    const but1 = document.createElement('button');
                    const as = document.createElement('a');
                        //setattributes

                        subparent.setAttribute("id", dams.unique_id);
                        but1.setAttribute("id", "buts"+dams.roomID);

                        as.href = '../files'+dams.filee;

                        //classname
                    subparent.className = "border p-8 rounded-lg";
                    subparent2.className="flex space-x-5";
                    subparent3.className="block";
                    ps1.className="text-xl font-bold";
                    ps2.className="text-xl font-medium";
                    ps3.className="text-xl font-bold";
                    ps4.className="text-xl font-bold";
                    ps5.className="text-base font-normal";
                    child.className="w-full flex justify-end";
                    child2.className="flex space-x-5";
                    but1.className="border bg-gray-800 text-white rounded-lg p-2";
                    as.className=" text-sky-500 font-normal underline ";


                    //appending
                    subparent.appendChild(subparent2);
                    subparent.appendChild(child2);
                    subparent.appendChild(subparent3);
                    mama.appendChild(subparent);
                    child.appendChild(but1);
                    subparent3.appendChild(ps4);
                    subparent3.appendChild(ps5);
                    subparent2.appendChild(ps1);
                    subparent2.appendChild(ps2);
                    subparent2.appendChild(child);
                    child.appendChild(but1);


                    child2.appendChild(ps3);
                    child2.appendChild(as);

                    //innertext
                    ps1.innerText = "Subject:";
                    ps2.innerText = dams.subj;
                    ps3.innerText = "Files:";
                    ps4.innerText = "Description";
                    ps5.innerText = dams.description;
                    as.innerText = dams.filee;
                    but1.innerText = "Delete";

                    //modal appends chingchengchongchong(END)
                    $("#buts"+dams.roomID).click(function(e) {
                            var geng3 = dams.roomID;
                            var geng = dams.unique_id;

                        axios.post('del_sub.php', JSON.stringify({
                            geng: geng,
                            geng3: geng3
                        }))
                        .then(function (response) {
                            console.log("success");



                            toastr.error("The tutor's Subject Has Been Deleted and will be notified through email<br>", "DELETED", { progressBar: true, closeButton: true });
                            setTimeout(function(){
                                toastr.clear();
                            },5000)

                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                        e.preventDefault();
                        });

                    $(".modal-close").click(function(e) {
                        e.preventDefault();
                        modal.classList.remove("modal-open");
                        if(mama.contains(subparent)){
                            setTimeout(function(){

                                mama.removeChild(subparent);

                                profss.removeChild(prfl);
                                tutname.innerText = "";
                        }, 500);

                        }


                        });
                   });

                    })

                    .catch(error => {
                        console.log(error);
                    });


                e.preventDefault();

            });







        });
        })
        .catch(error => {
        console.log(error);
        });


    </script>
</body>
</html>