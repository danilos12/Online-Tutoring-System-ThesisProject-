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
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../tailwind/tails.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">



    <title>Administrator</title>
</head>
<body class="hel">
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
                        <a href="./subjects">
                        <span class=" font-bold text-base">Subjects</span>
                        </a>
                        <span class=" font-bold text-base">></span>
                        <a href="./studentt">
                        <span class=" font-bold text-base">Students</span>
                        </a>
                    </div>
            </div>
            <div class="p-6 flex w-full justify-center">
                    <div class="w-full h-60 rounded-3xl bg-white drop-shadow-xl border flex p-2 pl-32">
                                <div class="h-80 w-80"><img src="./images/image-0.png" ></div>
                                <div class="p-12">
                                    <span class="font-medium text-3xl ">Students Information</span>
                                    <p class="font-normal pt-4"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla unde at aspernatur ad laudantium voluptatem debitis, non asperiores explicabo! Dolores ipsam laudantium sed perspiciatis illo fuga quia asperiores dignissimos aliquam.</p>
                                </div>
                    </div>
            </div>

        <div class=" max-h-max w-full   p-8 pt-2 overflow-hidden">

            <table class="w-full h-full text-sm  text-gray-500 drop-shadow-xl dark:text-gray-400 text-left rounded-lg">
                <thead class="bg-gray-200 h-full text-xs flex  w-full text-gray-900 uppercase rounded-lg ">
                    <tr class="flex w-full   mt-4 ">
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Student Name
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Email
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Password
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Contact No.
                        </th>
                        <th scope="col" class="p-2 w-1/4 text-lg text-center">
                            Valid Id
                        </th>
                        <th scope="col" class=" p-2 w-1/4 text-lg text-center">
                           Action
                        </th>
                    </tr>
                </thead>
                <tbody id="infos" class="custom-scrollbar block items-center justify-between overflow-y-scroll overflow-x-hidden w-full scroll-smooth" style="height: 38.5vh;" >








        </tbody>
    </table>



            </div>




        </div>






    </div>






        <div class="modal  opacity-0 pointer-events-none  fixed w-full h-full top-0 left-0 flex items-center justify-center overflow-y-scroll ">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-100"></div>

            <div class="flex modal-container bg-white w-1/2 h-1/2 p-6  rounded-lg drop-shadow-2xl z-50 overflow-y-scroll custom-scrollbar">

            <div class="modal-content block w-full   text-left  p-3">

                <div class="flex w-full  pb-3">
                    <div class=" w-full ">
                    <p class="text-2xl font-bold">Student Information</p>
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

                <div class="flex w-full justify-center pt-4">
                    <div class="">
                                <div id="prof" class="">

                            </div>
                        </div>
                        <div class="p-12 block  space-y-4">
                            <div class="">

                                <div  class="block">
                                    <div id="nams"  class="">

                                </div>
                                <p class="font-normal pt-2  text-sm text-gray-400">Student</p>
                                </div>
                            </div>
                            <div class="">
                                <div class="">
                                <p class="text-xl font-bold">Email</p>
                                </div>
                                <div id="emls" class="">

                                </div>
                            </div>
                            <div class="block">
                                <div class="">
                                <p class="font-bold text-xl">Contact</p>
                                </div>
                                <div id="numnum" class="">

                                </div>
                                </div>

                            </div>




                    </div>

                    <div class="block p-6">

                            <div  class="pb-6">
                                <p class="font-bold text-2xl">Valid Id</p>
                            </div>
                            <div id="valids" class="  drop-shadow-xl  object-fit rounded-lg">

                            </div>


                    </div>
                    <div class="block p-6">

                            <div  class="pb-6">
                                <p class="font-bold text-2xl">Subject Enrolled</p>
                            </div>
                            <div  class="block h-64  p-3 w-full">
                                <div id="subs" class="flex  overflow-x-auto p-3 items-center h-full w-full  space-x-5 ">










                                </div>


                            </div>


                    </div>

            </div>
        </div>
    </div>




    <script>



var modal = document.querySelector(".modal");



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

        var url = "studentsss.php";

        axios.get(url)
        .then(response => {
            var data1 = response.data;
            console.log(data1);

            var tableContent = document.getElementById("infos");
            var profs = document.getElementById("prof");
            var elements = document.getElementById("nams");
            var elements2 = document.getElementById("emls");
            var elements3 = document.getElementById("numnum");
            var elements4 = document.getElementById("valids");
            var subj = document.getElementById("subs");


            response.data.forEach(dats => {
                const row = document.createElement('tr');
                row.className += "bg-white border-b flex w-full items-center text-left h-16";
                tableContent.appendChild(row);
                const cell = document.createElement('td');
                const cell2 = document.createElement("td");
                const cell3 = document.createElement("td");
                const cell4 = document.createElement("td");
                const cell5 = document.createElement("td");
                const cell6 = document.createElement("td");

                const divs = document.createElement("div");
                const buts = document.createElement("button");
                buts.setAttribute("id", "dropdownDefaultButton"+dats.user_id);
                buts.setAttribute("data-dropdown-toggle", "dropdown");
                buts.setAttribute("type", "button");

                // buts.setAttribute("data-ids", dats.user_id);





                const svgCodeAsString = '<svg fill="none" class="w-4 h-4" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path> </svg>';

                cell.className = "w-1/4 text-base text-center pl-4 truncate";
                cell2.className = "w-1/4 text-center pl-8 truncate";
                cell3.className = "w-1/4 text-center pl-6 truncate";
                cell4.className = "w-1/4 text-center pl-6 truncate";
                cell5.className = "w-1/4 text-center pl-6 truncate";
                cell6.className = "w-1/4 text-center pl-8  align-middle  block";
                divs.className = "relative left-2 ";
                buts.className = "text-white bg-gray-500 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 ";

                cell.innerText = dats.fname + " " + dats.lname;
                cell2.innerText = dats.email;
                cell3.innerText = dats.password;
                cell4.innerText = dats.numbers;
                cell5.innerText = dats.valid_id;
                buts.innerHTML = svgCodeAsString;

                //dropdown start

                const dropdown = document.createElement("div");
                const uls = document.createElement("ul");
                const lis = document.createElement("li");
                const as = document.createElement("button");
                var ps =  document.createElement("p");
                var ps2 =  document.createElement("p");
                var ps3 =  document.createElement("p");
                var imgs =  document.createElement("img");
                var prfl =  document.createElement("img");
                imgs.setAttribute("src", "../files/"+dats.valid_id);
                prfl.setAttribute("src", "../files/"+dats.img);
                prfl.setAttribute("alt", "../files/"+dats.img);

                ps.setAttribute("id", "ps"+dats.user_id);
                ps2.setAttribute("id", "ps2"+dats.user_id);
                ps3.setAttribute("id", "ps2"+dats.user_id);
                ps.innerHTML = dats.fname +" "+ dats.lname;
                ps2.innerHTML = dats.email;
                ps3.innerHTML = dats.numbers;

                prfl.className="rounded-full border w-64 h-64 object-cover";
                ps.className="font-bold text-2xl";
                ps2.className="text-xl font-normal font-serif";
                ps3.className="font-normal pt-2  text-sm text-gray-400";
                as.setAttribute("id", "view"+dats.user_id);
                as.className="block px-4 py-2 hover:bg-gray-100 w-full  text-black dark:hover:text-black";
                uls.className = "py-1 text-sm text-gray-700 dark:text-gray-200";
                as.innerHTML = "View";


                dropdown.className = "z-10 hidden  absolute  bg-white divide-y divide-gray-100 rounded-lg drop-shadow-lg border w-32";
                dropdown.setAttribute("id", "dropdown"+dats.user_id);
                dropdown.appendChild(uls);



                uls.appendChild(lis);
                lis.appendChild(as);

                //dropdown end




                divs.appendChild(buts);
                divs.appendChild(dropdown);

                cell6.appendChild(divs);

                row.appendChild(cell);
                row.appendChild(cell2);
                row.appendChild(cell3);
                row.appendChild(cell4);
                row.appendChild(cell5);
                row.appendChild(cell6);

                    buts.addEventListener('click', function(event) {

                const dropdownMenu = document.getElementById("dropdown"+dats.user_id);


                console.log(dropdownMenu);


                dropdownMenu.classList.toggle('hidden');


                 });
                 var elementsArray = [];
                 $("#view"+dats.user_id).click(function(e) {


                        modal.classList.add("modal-open");

                   elements.appendChild(ps);
                   elements2.appendChild(ps2);
                   elements3.appendChild(ps3);
                   elements4.appendChild(imgs);

                   profs.appendChild(prfl);

                   var decsss = dats.unique_id;
                    axios.post('enrolled.php', JSON.stringify({
                        decsss: decsss
                    }))
                    .then(response => {

                        response.data.forEach(dams => {

                            console.log(dams.subject);
         //subject start
                    const ps1 = document.createElement('div');
                    const ps2 = document.createElement('div');
                    const ps3 = document.createElement('div');
                    const p4 = document.createElement('div');
                    const pk1 = document.createElement('p');
                    const pk2 = document.createElement('p');
                    const pk3 = document.createElement('p');
                    ps1.className = "w-60  h-full block border p-8 rounded-2xl ";
                    ps3.className = "flex w-32 items-center justify-end space-x-2 pt-6";
                    ps2.className = "w-32 flex justify-center";
                    pk1.className = "font-bold text-black text-2xl truncate";
                    pk2.className = "font-medium pk-2 text-black text-base";
                    pk3.className = "font-medium text-black text-xs";
                    p4.className = "block";

                    subj.appendChild(ps1);
                    ps1.appendChild(ps2);
                    ps2.appendChild(pk1);
                    ps1.appendChild(ps3);
                    ps3.appendChild(p4);
                    p4.appendChild(pk2);
                    p4.appendChild(pk3);

                    pk1.innerText = dams.subject;
                    pk2.innerText = dams.fname+" "+dams.lname;

                    pk3.innerText = "Teacher";
                //subject end;
                elementsArray.push(ps1);




                        });

                    }) .catch(function (error) {
                            console.log(error);
                        });
                        e.preventDefault();

                    });
                    $(".modal-close").click(function(e) {
                           e.preventDefault();
                    modal.classList.remove("modal-open");

                    if(elements.contains(ps)){
                        setTimeout(function(){
                        elements.removeChild(ps);
                        elements2.removeChild(ps2);
                        elements3.removeChild(ps3);
                        elements4.removeChild(imgs);
                        profs.removeChild(prfl);


                        }, 3000);


                        }
                        elementsArray.forEach(function(element) {
                        subj.removeChild(element);
                    });



                });




                });
                })
                .catch(error => {
                console.log(error);
                });





    </script>


</body>
</html>