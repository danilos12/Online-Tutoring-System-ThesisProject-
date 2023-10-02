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

<nav class=" border-gray-900 px-2 sm:px-4 py-6 rounded bg-white shadow-md sm">
    <div class="container flex flex-wrap justify-between items-center mx-auto ">
      
    <a href="./welcome.html" class="flex items-center mr-24">
       
        <span class="text-xl font-bold text-gray-600 transition-colors duration-300  hover:text-gray-700">OwlHub</span>
    </a>
    
    <!--START ICONS-->
    <div class=" w-3/4 flex justify-center">
      <button class="hey  inline-flex mr-12 items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
        <a href="./welcome.html">
          <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
      </a>
      
        </button>
      <button  class="hey mr-12 inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
      <a href="./assessment.html">
        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
      </a>
      
        </button>
      <button  class="hey mr-12 inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
      <a href="#">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
      </a>
      
        </button>
        </button>
      <button  class="hey mr-12 inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
      <a href="#">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
      </a>
      
        </button>



    <button class="hey mr-12 inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button"> 
    <a href="#">
      <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
      </a>
    
    </button>
    <button class="hey border-b-4 border-gray-700 mr-12 inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none dark:hover:text-gray-300 dark:text-gray-400" type="button">
      <a href="./e-wallet/index2.php">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
    </a>
    </button>
  


</div>
    <!--END ICONS-->

    <div class="flex items-center md:order-2  ">
     
       

       
     
      
  
      
      
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
                <a href="./profile.html" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg aria-hidden="true" class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                   <span class="ml-1 text-sm text-black">User Settings</span>
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