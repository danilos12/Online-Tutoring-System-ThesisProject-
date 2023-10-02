<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
  header("Location: ../login/index");
  die();
}

include 'config.php';

$query = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['unique_id']}");
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

<link rel="icon" type="image/png" sizes="32x32" href="../../favicon-32x32.png">
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

  <link rel="stylesheet" media="all" href="./styles/room.css">
  <link rel="stylesheet" media="all" href="./styles/main.css">
  <script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    
</head>

<body>
  <style>
    #nav {
      border-bottom: 1px solid #e1e1e1;
    }
    .my-font-size{
    font-size: 9px;
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
  background-color: #ffc107;
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
  <input type="hidden" id="unqStud2" name="unqStud2" value="<?php echo $row["unique_id"]; ?>">
  <input type="hidden" id="fnme2" name="fnme2" value="<?php echo $row["fname"]; ?>">
  <input type="hidden" id="lnme2" name="lnme2" value="<?php echo $row["lname"]; ?>">
<input type="hidden" id="fe" name="fe" value="<?php echo $id; ?>">
    
  <nav class="sticky top-0 z-50 border-gray-900 px-2 sm:px-4 py-6 rounded bg-white shadow-md sm">
    <div class="container flex w-full justify-between items-center mx-auto ">

      <a href="../welcome" class="flex items-center mr-24">

        <span class="text-xl font-bold text-gray-600 transition-colors duration-300  hover:text-gray-700">OwlHub</span>
      </a>

      <!--START ICONS-->
      <div class=" w-3/4  flex justify-center">
        <button data-popover-target="popover-bottom5" data-popover-placement="bottom" class="hey rounded-lg hover:bg-slate-200  w-24  h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black  focus:outline-none " type="button">
          <a href="../welcome">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
          </a>
          <div data-popover id="popover-bottom5" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
              <h3 class="font-semibold text-gray-900 dark:text-white">Home</h3>
            </div>

            <div data-popper-arrow></div>
          </div>
        </button>
        <button data-popover-target="popover-bottom6" data-popover-placement="bottom" class="hey hover:bg-slate-200 rounded-lg h-16 active:border-b-4 border-gray-700 w-24  h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black  focus:outline-none " type="button">
          <a href="../search">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </a>
          <div data-popover id="popover-bottom6" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
              <h3 class="font-semibold text-gray-900 dark:text-white">Search</h3>
            </div>

            <div data-popper-arrow></div>
          </div>
        </button>
        <button data-popover-target="popover-bottom4" data-popover-placement="bottom" class="hey hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button">
          <a href="../viewSub">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          </a>
          <div data-popover id="popover-bottom4" role="tooltip" class="inline-block absolute invisible z-10 w-40 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
              <h3 class="font-semibold text-gray-900 dark:text-white">View Subject</h3>
            </div>

            <div data-popper-arrow></div>
          </div>
        </button>

        





        <button data-popover-target="popover-bottom" data-popover-placement="bottom" class="hey active:border-b-4 border-gray-700 hover:bg-slate-200 w-24 rounded-lg h-16 justify-center inline-flex items-center text-sm font-medium text-center text-black hover:text-gray-900 focus:outline-none" type="button">
          <a href="../e-wallet">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
            </svg>
          </a>
          <div data-popover id="popover-bottom" role="tooltip" class="inline-block absolute invisible z-10 w-24 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
              <h3 class="font-semibold text-gray-900 dark:text-white">E-wallet</h3>
            </div>

            <div data-popper-arrow></div>
          </div>
        </button>




      </div>
      <!--END ICONS-->

      <div class="flex items-center md:order-2  ">







        


        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex ease-in-out items-center text-sm font-medium text-gray-900 rounded-full hover:text-blue-600 dark:hover:text-blue-500 md:mr-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white" type="button">
          <span class="sr-only">Open user menu</span>
          <?php echo '<img class="mr-2 w-8 h-8 rounded-full" src="../../files/' . $row['img'] . '" alt="">' ?>

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
              <a href="../profile" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
                <svg aria-hidden="true" class="flex-shrink-0 w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
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
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
          <path d="M24 18v1h-24v-1h24zm0-6v1h-24v-1h24zm0-6v1h-24v-1h24z" fill="#ede0e0">
            <path d="M24 19h-24v-1h24v1zm0-6h-24v-1h24v1zm0-6h-24v-1h24v1z" />
        </svg>
      </button>
      <button class="bg-gray-800" id="chat__button"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" fill="#ede0e0" clip-rule="evenodd">
          <path d="M24 20h-3v4l-5.333-4h-7.667v-4h2v2h6.333l2.667 2v-2h3v-8.001h-2v-2h4v12.001zm-15.667-6l-5.333 4v-4h-3v-14.001l18 .001v14h-9.667zm-6.333-2h3v2l2.667-2h8.333v-10l-14-.001v10.001z" />
        </svg></button>
    </div>



  </nav>

  <div style="display: none;">
    <video class="recording" autoplay muted width="500px" height="500px"></video>
  </div>
  <div>
    <h1>OUTPUT</h1>
    <video style="display: none;" class="output" height="500px"></video>

    <button class="start-btn">Start Recording</button>

    <a style="display: none;" href="#" download="output.mp4" class="download-anc">Download</a>

  </div>



  <div id="room__container">

    <section class="members__container" id="members__container">

      <div id="members__headesr" class="flex justify-around items-center h-16 bg-black">
        <p>Participants</p>
        <strong id="members__count">0</strong>
      </div>

      <div id="member__list">
      </div>

    </section>

    <section id="stream__container">

      <div id="stream__box"></div>

      <div id="streams__container"></div>

      <div class="stream__actions">
        <button id="camera-btn" class="active">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M5 4h-3v-1h3v1zm10.93 0l.812 1.219c.743 1.115 1.987 1.781 3.328 1.781h1.93v13h-20v-13h3.93c1.341 0 2.585-.666 3.328-1.781l.812-1.219h5.86zm1.07-2h-8l-1.406 2.109c-.371.557-.995.891-1.664.891h-5.93v17h24v-17h-3.93c-.669 0-1.293-.334-1.664-.891l-1.406-2.109zm-11 8c0-.552-.447-1-1-1s-1 .448-1 1 .447 1 1 1 1-.448 1-1zm7 0c1.654 0 3 1.346 3 3s-1.346 3-3 3-3-1.346-3-3 1.346-3 3-3zm0-2c-2.761 0-5 2.239-5 5s2.239 5 5 5 5-2.239 5-5-2.239-5-5-5z" />
          </svg>
        </button>
        <button id="mic-btn" class="active">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M12 2c1.103 0 2 .897 2 2v7c0 1.103-.897 2-2 2s-2-.897-2-2v-7c0-1.103.897-2 2-2zm0-2c-2.209 0-4 1.791-4 4v7c0 2.209 1.791 4 4 4s4-1.791 4-4v-7c0-2.209-1.791-4-4-4zm8 9v2c0 4.418-3.582 8-8 8s-8-3.582-8-8v-2h2v2c0 3.309 2.691 6 6 6s6-2.691 6-6v-2h2zm-7 13v-2h-2v2h-4v2h10v-2h-4z" />
          </svg>
        </button>
        <button id="screen-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M0 1v17h24v-17h-24zm22 15h-20v-13h20v13zm-6.599 4l2.599 3h-12l2.599-3h6.802z" />
          </svg>
        </button>
        <button class="leave-btn" id="leave-btn" style="background-color: #FF5050;">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path d="M16 10v-5l8 7-8 7v-5h-8v-4h8zm-16-8v20h14v-2h-12v-16h12v-2h-14z" />
          </svg>
        </button>
      </div>

      <button class="join-btn" id="join-btn">Join Stream</button>
    </section>

    <section id="messages__container" class="">

      <div id="messages" class=""></div>

      <form id="message__form">
        <input type="text" name="message" placeholder="Send a message...." />
      </form>

    </section>
  </div>






  <script>
    var video = document.querySelector('.recording');
    var output = document.querySelector('.output');
    var start = document.querySelector('.join-btn');
    var stop = document.querySelector('.leave-btn');
    var anc = document.querySelector(".download-anc")

    var data = [];

    // In order record the screen with system audio
    var recording = navigator.mediaDevices.getDisplayMedia({
        video: {
          mediaSource: 'screen',
        },
        audio: true,
      })
      .then(async (e) => {

        // For recording the mic audio
        let audio = await navigator.mediaDevices.getUserMedia({
          audio: true,
          video: false
        })

        // Assign the recorded mediastream to the src object
        video.srcObject = e;

        // Combine both video/audio stream with MediaStream object
        let combine = new MediaStream(
          [...e.getTracks(), ...audio.getTracks()])

        /* Record the captured mediastream
           with MediaRecorder constructor */
        let recorder = new MediaRecorder(combine);

        start.addEventListener('click', (e) => {

          // Starts the recording when clicked
          recorder.start();
          toastr.info("Record started", "Record", { progressBar: true , closeButton: true });

          // For a fresh start
          data = []
        });

        stop.addEventListener('click', (e) => {

          // Stops the recording
          recorder.stop();
          
          toastr.info("recording stopped", "Record", { progressBar: true , closeButton: true });
        });

        /* Push the recorded data to data array
          when data available */
        recorder.ondataavailable = (e) => {
          data.push(e.data);
        };

        recorder.onstop = () => {

          /* Convert the recorded audio to
             blob type mp4 media */
          let blobData = new Blob(data, {
            type: 'video/mp4'
          });

          // Convert the blob data to a url
          let url = URL.createObjectURL(blobData)


          // Assign the url to the output video tag and anchor
          output.src = url
          anc.href = url


          const myFile = new File(
            [blobData],
            "demo.mp4", {
              type: 'video/mp4'
            }
          );
          var formData = new FormData();
          formData.append("yawas", myFile);
          var ee = document.getElementById("unqStud2").value;
          formData.append("usUnq", ee);
          var ee2 = document.getElementById("fnme2").value;
          formData.append("usF2", ee2);
          var ee3 = document.getElementById("lnme2").value;
          formData.append("usL2", ee3);
          var roo = document.getElementById("fe").value;
          formData.append("uRoo", roo);
          var url2 = "yati.php";
          axios.post(url2, formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            })

            .then(function(res) {
              
              toastr.info("Recording have been saved", "Record", { progressBar: true , closeButton: true });

            })
            .catch(function(error) {
              toastr.error("Error recording", "Error", { progressBar: true , closeButton: true });
            })
        };
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
  
  
</body>

</html>