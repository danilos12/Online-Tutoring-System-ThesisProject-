<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['unique_id']}");

if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
}

?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<nav class="sticky top-0 z-50 border-gray-900 px-2 sm:px-4 py-6 rounded bg-white shadow-md sm">
    <div class="container flex flex-wrap justify-between items-center mx-auto ">

      <a href="./welcome" class="flex items-center mr-24">

        <span class="text-xl font-bold text-gray-600 transition-colors duration-300  hover:text-gray-700">OwlHub</span>
      </a>

      <!--START ICONS-->
      <span class="text-3xl cursor-pointer mx-2 md:hidden block"><ion-icon name="menu" onclick="Menu(this)"></ion-icon></span>
      <div class=" w-3/4 flex justify-center">
      <ul id="heyss" class="md:flex md:w-full md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-in duration-500">
      <button data-popover-target="popover-bottom5" data-popover-placement="bottom" class="hey hover:bg-slate-200 rounded-lg h-16 active:border-b-4 border-gray-700 w-24  h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black  focus:outline-none " type="button">
        <a href="./welcome">
          <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
      </a>
      <div data-popover id="popover-bottom5" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Home</h3>
        </div>

        <div data-popper-arrow></div>
    </div>
        </button>
      <button data-popover-target="popover-bottom6" data-popover-placement="bottom" class="hey hover:bg-slate-200 rounded-lg h-16 active:border-b-4 border-gray-700 w-24  h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black  focus:outline-none " type="button">
        <a href="./search">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
      </a>
      <div data-popover id="popover-bottom6" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Search</h3>
        </div>

        <div data-popper-arrow></div>
    </div>
        </button>
      <button data-popover-target="popover-bottom4" data-popover-placement="bottom"  class="hey active:border-b-4 border-gray-700 hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button">
      <a href="./assessment">
        <svg class="w-9 h-9" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" /></svg>
      </a>
      <div data-popover id="popover-bottom4" role="tooltip" class="inline-block absolute invisible z-10 w-40 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Take Assessment</h3>
        </div>

        <div data-popper-arrow></div>
    </div>
        </button>

      <button data-popover-target="popover-bottom3" data-popover-placement="bottom"  class="hey active:border-b-4 border-gray-700 hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button">
      <a href="./Call/lobby">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
      </a>
      <div data-popover id="popover-bottom3" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Room</h3>
        </div>

        <div data-popper-arrow></div>
    </div>
        </button>





        <button data-popover-target="popover-bottom" data-popover-placement="bottom" class="hey active:border-b-4 border-gray-700 hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button">
          <a href="./e-wallet.php">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" /></svg>
        </a>
        <div data-popover id="popover-bottom" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">E-wallet</h3>
            </div>

            <div data-popper-arrow></div>
        </div>
        </button>


</ul>

</div>

      <div class="flex items-center md:order-2  ">









        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex ease-in-out items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
          <span class="sr-only">Open user menu</span>

          <?php echo '<img class="mr-2 w-8 h-8 rounded-full object-cover" src="../files/'. $row['img'] .'" alt="">' ?>
          <span class="text-black"><?php echo $row['fname'], " ", $row['lname'] ?></span>
          <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>


        <!-- Dropdown menu -->
        <div id="dropdownAvatarName" class="hidden ease-in-out z-10 w-44 bg-grey rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:bg-white" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1710px);">
          <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
            <div class="font-medium text-black">Student</div>
            <div class="truncate text-black"><?php echo $row['email'] ?></div>
          </div>
          <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">

            <li>
              <a href="./profile" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                <svg aria-hidden="true" class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
                <span class="ml-1 text-sm text-black">User Settings</span>
              </a>
            </li>






          </ul>
          <div class="py-1">
            <a href="logout?logout_id=<?php echo $row['unique_id']; ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-200 dark:text-gray-200 dark:hover:text-white"><span class="text-black">Sign out</span></a>
          </div>
        </div>

      </div>
      <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">

      </div>
    </div>
  </nav>