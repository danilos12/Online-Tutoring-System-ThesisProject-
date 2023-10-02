<?php include('db.php');
        include('test.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
       
       
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
       
    <link rel="stylesheet" href="/e-wallet/styl.css">
    <title>E-wallet</title>
</head>
<body>
    <style>
    .error{
   
 
    background-color: red;
    color: black;
        }
      
    </style>

<nav class=" border-gray-900 px-2 sm:px-4 py-6 rounded bg-white shadow-md">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="https://flowbite.com/" class="flex items-center">
       
        <span class="text-xl font-bold text-gray-600 transition-colors duration-300  hover:text-gray-700">OwlHub</span>
    </a>
    <div class="flex items-center md:order-2">

      <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="hey inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
        <svg class="w-5 h-5 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
        <div class="flex relative">
          <div class="inline-flex relative -top-2 right-3 w-3 h-3 bg-red-500 rounded-full border-2 border-white dark:border-gray-900"></div>
        </div>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownNotification" class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 15303px);">
          <div class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
              Notifications
          </div>
          <div class="divide-y divide-gray-100 dark:divide-gray-700">
            <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
              <div class="flex-shrink-0">
                <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white dark:border-gray-800">
                  <svg class="w-3 h-3 text-white" aria-hidden="true" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                </div>
              </div>
              <div class="pl-3 w-full">
                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                  <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
              </div>
            </a>
            <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
              <div class="flex-shrink-0">
                <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Joseph image">
                <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-800">
                  <svg class="w-3 h-3 text-white" aria-hidden="true" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                </div>
              </div>
              <div class="pl-3 w-full">
                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                  <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
              </div>
            </a>
            <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
              <div class="flex-shrink-0">
                <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-800">
                  <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </div>
              </div>
              <div class="pl-3 w-full">
                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                  <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
              </div>
            </a>
            <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
              <div class="flex-shrink-0">
                <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Leslie image">
                <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-800">
                  <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
              </div>
              <div class="pl-3 w-full">
                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                  <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
              </div>
            </a>
            <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
              <div class="flex-shrink-0">
                <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-800">
                  <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                </div>
              </div>
              <div class="pl-3 w-full">
                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                  <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
              </div>
            </a>
          </div>
          <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
            <div class="inline-flex items-center ">
              <svg class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                View all
            </div>
          </a>
        </div>

        <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="hey inline-flex items-center text-sm font-medium text-center text-gray-900 hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
          <div class="flex relative">
            <div class="inline-flex relative -top-2 right-3 w-3 h-3 bg-red-500 rounded-full border-2 border-white dark:border-gray-900"></div>
          </div>
          </button>
          <!-- Dropdown menu -->
          <div id="dropdownNotification" class="hidden z-20 w-full max-w-sm bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 15303px);">
            <div class="block py-2 px-4 font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-800 dark:text-white">
            
            </div>
            <div class="divide-y divide-gray-100 dark:divide-gray-700">
              <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex-shrink-0">
                  <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                  <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-blue-600 rounded-full border border-white dark:border-gray-800">
                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                  </div>
                </div>
                <div class="pl-3 w-full">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400">New message from <span class="font-semibold text-gray-900 dark:text-white">Jese Leos</span>: "Hey, what's up? All set for the presentation?"</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">a few moments ago</div>
                </div>
              </a>
              <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex-shrink-0">
                  <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-2.jpg" alt="Joseph image">
                  <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-800">
                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path></svg>
                  </div>
                </div>
                <div class="pl-3 w-full">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Joseph Mcfall</span> and <span class="font-medium text-gray-900 dark:text-white">5 others</span> started following you.</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">10 minutes ago</div>
                </div>
              </a>
              <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex-shrink-0">
                  <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                  <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-red-600 rounded-full border border-white dark:border-gray-800">
                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                  </div>
                </div>
                <div class="pl-3 w-full">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                </div>
              </a>
              <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex-shrink-0">
                  <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-4.jpg" alt="Leslie image">
                  <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-green-400 rounded-full border border-white dark:border-gray-800">
                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                  </div>
                </div>
                <div class="pl-3 w-full">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                </div>
              </a>
              <a href="#" class="flex py-3 px-4 hover:bg-gray-100 dark:hover:bg-gray-700">
                <div class="flex-shrink-0">
                  <img class="w-11 h-11 rounded-full" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                  <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-purple-500 rounded-full border border-white dark:border-gray-800">
                    <svg class="w-3 h-3 text-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                  </div>
                </div>
                <div class="pl-3 w-full">
                    <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                    <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                </div>
              </a>
            </div>
            <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
              <div class="inline-flex items-center ">
                <svg class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path></svg>
                  View all
              </div>
            </a>
          </div>
                  
       
     

  
      
      
      <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex ease-in-out items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
        <span class="sr-only">Open user menu</span>
        <img class="mr-2 w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="">
        <span class="text-black">Bonnie Green</span> 
        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
     

          <!-- Dropdown menu -->
          <div id="dropdownAvatarName" class="hidden ease-in-out z-10 w-44 bg-grey rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:bg-white" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1710px);">
            <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
              <div class="font-medium text-black">Student</div>
              <div class="truncate text-black">name@flowbite.com</div>
            </div>
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
              <li>
                <a href="../welcome.html" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg class="w-4 h-4 text-gray-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                   <span class="ml-1 text-sm text-black">Home</span>
                </a>
             </li>
              <li>
                <a href="../profile.html" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg aria-hidden="true" class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                   <span class="ml-1 text-sm text-black">User Settings</span>
                </a>
             </li>
              <li>
                <a href="e-wallet/index.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" /><path fillRule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clipRule="evenodd" /></svg>
                   <span class="ml-1 text-sm text-black">Wallet</span>
                </a>
             </li>
              <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clipRule="evenodd" /></svg>
                   <span class="ml-1 text-sm text-black">Calendar</span>
                </a>
             </li>
              <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" /></svg>
                   <span class="ml-1 text-sm text-black">Room</span>
                </a>
             </li>
              
              
            </ul>
            <div class="py-1">
              <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-200 dark:text-gray-200 dark:hover:text-white"><span class="text-black">Sign out</span></a>
            </div>
          </div>

    </div>
    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
 
    </div>
    </div>
  </nav>







    <div class="div3 border md:container md:mx-auto mt-8   drop-shadow-lg align-middle ">
        
            <div class="billing "><h1 class="font-sans text-4xl">Billing Details</h1>
            <div class="card1 shadow p-3 mb-5 bg-white rounded "><div><span>Balance</span></div><h1 class=" text-6xl">₱<?php echo  $row["balance"];?></h1></div>
                <div class="card2">
                    <div class="but1"><button type="button" class="text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">Withdraw</button>
                    <button type="button" class="text-white bg-[#050708] hover:bg-[#050708]/80 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#050708]/40 dark:focus:ring-gray-600 mr-2 mb-2">Deposit</button>
                    </div>
                </div>
                
                
            </div>
         
            <div class="transaction  "><h1 class="font-sans text-4xl">Transaction History</h1>
            <div class="tabs bg-lime-500 h-3.5 flex mt-2.5">
            <table class="text-left w-full ">
		<thead class="bg-black flex text-white w-full ">
			<tr class="flex w-full mb-4">
				<th class="p-4 w-1/4">Id #</th>
				<th class="p-4 w-1/4">Amount</th>
				<th class="p-4 w-1/4">Receipient</th>
				<th class="p-4 w-1/4">Dates</th>
			</tr>
		</thead>
    <!-- Remove the nasty inline CSS fixed height on production and replace it with a CSS class — this is just for demonstration purposes! -->
		<tbody class="bg-grey-light flex flex-col items-center justify-between overflow-y-scroll w-full" style="height: 33vh;">
		
	
            <?php 
                    
                    while($row2 = $resultEventList2->fetch_assoc()){
                     echo "<br> 
                     <tr class='flex w-full h-16 align-middle border-b'>
                
                     <td class='p-5 w-1/4'>" .$row2["id"]. "</td>
                     <td class='p-5 w-1/4'> ₱" .$row2["amount"]. "</td>
                     <td class='p-5 w-1/4'> " .$row2["names"]. "</td>
                     <td class='p-5 w-1/4'>" .$row2["dates"]. "</td>
                   
                     
                     
                     </tr>";
                   }
                   ?>
	
		
		</tbody>
	</table>
            </div></div>

    </div>
   
</body>
</html>