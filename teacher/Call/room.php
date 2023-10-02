<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$id = $_GET['room'];
$query211 = mysqli_query($conn, "SELECT * FROM enrolled WHERE roomID = '$id'");
if (mysqli_num_rows($query) > 0) {
  $row = mysqli_fetch_assoc($query);
}
if (mysqli_num_rows($query211) > 0) {
  $rowq = mysqli_fetch_assoc($query211);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Room</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

    <link rel="stylesheet" media="all" href="./styles/room.css">
        <link rel="stylesheet" media="all" href="./styles/main.css">
        <link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>
<body>
    <style>
#nav{
    border-bottom: 1px solid #e1e1e1;
}
    </style>


<nav class="sticky top-0 z-50 border-gray-900 px-2 sm:px-4 py-6 rounded bg-white shadow-md sm">
    <div class="container flex w-full justify-between items-center mx-auto ">

    <a href="../welcome" class="flex items-center mr-24">

        <span class="text-xl font-bold text-gray-600 transition-colors duration-300  hover:text-gray-700">OwlHub</span>
    </a>

    <!--START ICONS-->
    <div class=" w-3/4  flex justify-center">
      <button data-popover-target="popover-bottom5" data-popover-placement="bottom" class="hey rounded-lg hover:bg-slate-200  w-24  h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black  focus:outline-none " type="button">
        <a href="../welcome">
          <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
      </a>
      <div data-popover id="popover-bottom5" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Home</h3>
        </div>

        <div data-popper-arrow></div>
    </div>
        </button>
        <button data-popover-target="popover-bottom2" data-popover-placement="bottom"  class="hey active:border-b-4 border-gray-700 hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button"> 
      <a href="../viewSub">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
      </a>
      <div data-popover id="popover-bottom2" role="tooltip" class="inline-block absolute invisible z-10 w-40 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">View Subject</h3>
        </div>
       
        <div data-popper-arrow></div>
    </div>
        </button>
      
        
      <button data-popover-target="popover-bottom3" data-popover-placement="bottom"  class="hey active:border-b-4 border-gray-700 hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button"> 
      <a href="./lobby">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
      </a>
      <div data-popover id="popover-bottom3" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
            <h3 class="font-semibold text-gray-900 dark:text-white">Room</h3>
        </div>

        <div data-popper-arrow></div>
    </div>
        </button>
        <div class="w-auto justify-center inline-flex flex flex-row items-center text-xl font-medium text-center text-black space-x-4 " id="stopwatch">
    <p class="" id="time3">00:00:00</p>
    <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800 " id="start-button3">Start</button>
    <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" id="stop-button3">Stop</button>
    <button class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-gray-600 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" id="reset-button3">Reset</button>
    <input hidden type="number" id="eut" value="<?php echo $rowq['hourlyrate']; ?>">
    <input hidden type="number" id="eut5" value="<?php echo $rowq['hourlyrate']; ?>">
    <input hidden type="text" id="eut2" value="<?php echo $rowq['tFname']; ?>">
    <input hidden type="text" id="eut3" value="<?php echo $rowq['tLname']; ?>">
    <input hidden type="number" id="eut4" value="<?php echo $rowq['roomID']; ?>">
    <input hidden type="number" id="eut6" value="<?php echo $rowq['unique_id']; ?>">
    <input hidden type="number" id="eut7" value="<?php echo $rowq['unique_id_stud']; ?>">
    <input hidden type="text" id="eut8" value="<?php echo $rowq['subject']; ?>">
    <input hidden type="text" id="eut9" value="<?php echo $rowq['fname']; ?>">
    <input hidden type="text" id="eut10" value="<?php echo $rowq['lname']; ?>">
  </div>







</div>
    <!--END ICONS-->

    <div class="flex items-center md:order-2  ">







       <div class="w-100 h-10  rounded-lg flex justify-center mr-12">
      <a class="nav__link w-24 h-14 text-center mr-4 " id="create__room__btn" href="./lobby">
        Create Room
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="black" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/></svg>
    </a>
    


  </div>


      <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex ease-in-out items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
        <span class="sr-only">Open user menu</span>
        <?php echo '<img class="mr-2 w-8 h-8 rounded-full" src="../../files/'. $row['img'] .'" alt="">' ?>
        <span class="text-black"><?php echo $row['fname'], " ", $row['lname'] ?></span>
        <svg class="w-4 h-4 mx-1.5" aria-hidden="true" fill="black" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>


          <!-- Dropdown menu -->
          <div id="dropdownAvatarName" class="hidden ease-in-out z-10 w-44 bg-grey rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:bg-white" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 1710px);">
            <div class="py-3 px-4 text-sm text-gray-900 dark:text-white">
              <div class="font-medium text-black">Tutor</div>
              <div class="truncate text-black"><?php echo $row['email'] ?></div>
            </div>
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">

              <li>
                <a href="../profile" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                  <svg aria-hidden="true" class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                   <span class="ml-1 text-sm text-black">User Settings</span>
                </a>
             </li>






            </ul>
            <div class="py-1">
              <a href="../logout.php?logout_id=<?php echo $row['unique_id']; ?>" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-200 dark:text-gray-200 dark:hover:text-white"><span class="text-black">Sign out</span></a>
            </div>
          </div>

    </div>
    <div class="hidden  justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">

    </div>
    </div>
    <div class="nav--list ">
            <button id="members__button">
               <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0"><path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z"/></svg>
            </button>
            <button class="bg-gray-800" id="chat__button"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd"><path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z"/></svg></button>
       </div>



  </nav>





        <div id="room__container">

            <section class="members__container" id="members__container">

            <div id="members__headesr" class="flex justify-around items-center h-16 bg-black">
                <p>Participants</p>
                <strong id="members__count">0</strong>
            </div>

            <div id="member__list" >
            </div>

            </section>

            <section id="stream__container">

                <div id="stream__box"></div>

                <div id="streams__container"></div>

                <div class="stream__actions">
                    <button id="camera-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M5 4h-3v-1h3v1zm10.93 0l.812 1.219c.743 1.115 1.987 1.781 3.328 1.781h1.93v13h-20v-13h3.93c1.341 0 2.585-.666 3.328-1.781l.812-1.219h5.86zm1.07-2h-8l-1.406 2.109c-.371.557-.995.891-1.664.891h-5.93v17h24v-17h-3.93c-.669 0-1.293-.334-1.664-.891l-1.406-2.109zm-11 8c0-.552-.447-1-1-1s-1 .448-1 1 .447 1 1 1 1-.448 1-1zm7 0c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z"/></svg>
                    </button>
                    <button id="mic-btn" class="active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c1.103 0 2 .897 2 2v7c0 1.103-.897 2-2 2s-2-.897-2-2v-7c0-1.103.897-2 2-2zm0-2c-2.209 0-4 1.791-4 4v7c0 2.209 1.791 4 4 4s4-1.791 4-4v-7c0-2.209-1.791-4-4-4zm8 9v2c0 4.418-3.582 8-8 8s-8-3.582-8-8v-2h2v2c0 3.309 2.691 6 6 6s6-2.691 6-6v-2h2zm-7 13v-2h-2v2h-4v2h10v-2h-4z"/></svg>
                    </button>
                    <button id="screen-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z"/></svg>
                    </button>
                    <button id="leave-btn" style="background-color: #FF5050;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 10v-5l8 7-8 7v-5h-8v-4h8zm-16-8v20h14v-2h-12v-16h12v-2h-14z"/></svg>
                    </button>
                </div>

                <button class="join-btn" id="join-btn">Join Stream</button>
            </section>

            <section id="messages__container" class="">

                <div id="messages" class=""></div>

                <form id="message__form" >
                    <input type="text"  name="message" placeholder="Send a message...." />
                </form>

            </section>
        </div>


<script>
  
let interval;
let timerRunning = false;
let elapsedTime = 0;
let hourlyRate = document.getElementById("eut").value;
//let secondRate = document.getElementById("eut").value;
let tFname = document.getElementById("eut2").value;
let tLname = document.getElementById("eut3").value;
let roomIDD = document.getElementById("eut4").value;
let tryyy = document.getElementById("eut5").value;
let un = document.getElementById("eut6").value;
let unS = document.getElementById("eut7").value;
let subje = document.getElementById("eut8").value;
let fnme = document.getElementById("eut9").value;
let lnme = document.getElementById("eut10").value;
let cost = 0;
function getCurrentTime() {
  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();
  return hours + ':' + minutes + ':' + seconds;
}
function startTimer() {
    var startTime1 = getCurrentTime();
    window.startTime1 = startTime1;
  if (!timerRunning) {
    interval = setInterval(function() {
      elapsedTime++;
      let seconds = elapsedTime % 60;
      let minutes = Math.floor(elapsedTime / 60) % 60;
      let hours = Math.floor(elapsedTime / 3600);
       cost = (hours + (minutes / 60)) * hourlyRate;
       //cost = elapsedTime * secondRate;
      console.log(hours + ":" + minutes.toString().padStart(2, '0') + ":" + seconds.toString().padStart(2, '0')); // 02:00:00
console.log("₱" + cost); 
      document.getElementById('time3').innerHTML =
        hours.toString().padStart(2, '0') +
        ':' +
        minutes.toString().padStart(2, '0') +
        ':' +
        seconds.toString().padStart(2, '0');
    }, 1000);
    timerRunning = true;
  }
}


function stopTimer() {
  clearInterval(interval);
  
  var endTime1 = getCurrentTime();
window.endTime1 = endTime1;

}


function resetTimer() {
  stopTimer();
  elapsedTime = 0;
  document.getElementById('time3').innerHTML = '00:00:00';
  window.endTime1 = null;
   window.startTime1 = null;
   timerRunning = false;
}


document.getElementById('start-button3').addEventListener('click', startTimer);

document.getElementById('reset-button3').addEventListener('click', resetTimer);





document.getElementById('stop-button3').addEventListener('click', function() {
  stopTimer();
if (timerRunning) {
    var start = moment.duration(window.startTime1);
var end = moment.duration(window.endTime1);
var ced = moment.utc(end.asMilliseconds() - start.asMilliseconds()).format("HH:mm:ss");
  
  let xhr = new XMLHttpRequest();
  xhr.open('POST', 'save-time.php', true);
  xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function() {
    if (xhr.status === 200) {
      console.log(xhr.responseText);
      
    }
  };
  console.log(ced);
  xhr.send('elapsed_time=' + elapsedTime + '&cost=' + cost + '&tFname=' + tFname + '&tLname=' + tLname + '&rer=' + tryyy + '&dan=' + roomIDD + '&unq1=' + un + '&unqStud=' + unS + '&strt=' + window.startTime1 + '&endd=' + window.endTime1 + '&tst=' + ced + '&subj=' + subje + '&fnam=' + fnme + '&lnam=' + lnme);
  timerRunning = false;
}

});

window.addEventListener("beforeunload", function (e) {
  if (timerRunning) {
    var endTime1 = getCurrentTime();
    window.endTime1 = endTime1;
    var start = moment.duration(window.startTime1);
    var end = moment.duration(window.endTime1);
    var ced = moment.utc(end.asMilliseconds() - start.asMilliseconds()).format("HH:mm:ss");

    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'save-time.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
      if (xhr.status === 200) {
        console.log(xhr.responseText);

      }
    };
    //console.log(ced);
    xhr.send('elapsed_time=' + elapsedTime + '&cost=' + cost + '&tFname=' + tFname + '&tLname=' + tLname + '&rer=' + tryyy + '&dan=' + roomIDD + '&unq1=' + un + '&unqStud=' + unS + '&strt=' + window.startTime1 + '&endd=' + window.endTime1 + '&tst=' + ced + '&subj=' + subje + '&fnam=' + fnme + '&lnam=' + lnme);
    timerRunning = false;
  }
});
  </script>




    <script type="text/javascript" src="./js/AgoraRTC_N-4.11.0.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/agora-rtm-sdk-1.4.4.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/AgoraRTC_N-4.15.0.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./js/agora-rtm-sdk-1.5.1.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/room.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/room_rtm.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="./js/room_rtm.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="./js/room_rtc.js"></script>
    <script>
       function Copy()
            {
              var dummy = document.createElement('input'),
              text = window.location.href;

              document.body.appendChild(dummy);
              dummy.value = text;
              dummy.select();
              document.execCommand('copy');
              document.body.removeChild(dummy);
            }
    </script>
</body>

</html>