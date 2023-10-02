<?php
include 'config.php';
include 'headercopy.php';


$query12 = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id_stud = {$_SESSION['unique_id']}");
$query12345 = mysqli_query($conn, "SELECT COUNT(*) as ts FROM enrolled WHERE unique_id_stud = {$_SESSION['unique_id']}");
$query123456 = mysqli_query($conn, "SELECT COUNT(*) as sessions FROM times WHERE unique_id_stud = {$_SESSION['unique_id']}");

if (mysqli_num_rows($query12345) > 0) {
  $row123 = mysqli_fetch_assoc($query12345);
}
if (mysqli_num_rows($query123456) > 0) {
  $row1234 = mysqli_fetch_assoc($query123456);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="./output.css" rel="stylesheet">
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>

<body>

  <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
    <div class="lg:flex md:block lg:h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
      <!-- Loading screen -->




      <div class="relative  sm:rounded-lg w-full mt-12  px-40 grid grid-cols-1 gap-4">

        <div class=" p-6 w-full  ">
                <div class="w-full flex shadow-md p-6">
                    <div class="w-1/2 block px-12">
                          <div class="">
                        <p class="text-6xl font-sans font-bold ">Welcome <?php echo $row['fname']?>!</p>
                        </div>
                        <div class="py-12 ">

                          <p>Welcome dear <?php echo $row['fname']?> to our online classroom! I'm excited to have the opportunity to teach you remotely. In your dashboard you can see the status of:</p>
                          <p class="font-bold"> Enrolled Subjects</p>
                          <p class="font-bold"> Total Session</p>

                        </div>
                    </div>
                    <div class="w-1/2 h-38  flex justify-center ">
                <img src="../teacher/images/welcome.png" width="350"  alt="">

                </div>

                  </div>

                          <!-- Start -->
                      <div class="flex  justify-center space-x-5 w-full py-6">
                                <div class=" h-40 max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow-md ">

                                    <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Enrolled Subjects</h5>

                                    <p class="text-center text-2xl mb-3 font-medium text-gray-700 "><?php echo $row123['ts']?> </p>

                                </div>
                                <div class=" h-40 max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow-md ">

                                    <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Total Session</h5>

                                    <p class="text-center text-2xl mb-3 font-medium text-gray-700 "> <?php echo $row1234['sessions']?></p>

                                </div>



                        </div>
                          <!-- End -->


        </div>

      </div>





      <!--right side bar-->
      <div class=" cal h-full w-96 block p-3">
        <link rel="stylesheet" href="src/mini-event-calendar.min.css">
        <div id="wrapper">
          <div class="lg:relative">
            <div id="calendar"></div>

          </div>



        </div>


      </div>
      <!--End of right side bar-->
    </div>

    <div>
      <a href="#" id="heyss" onclick="myopen()" class=" fixed bottom-10 right-0 h-14 w-16 items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
        <svg class="w-10 h-10 text-black" fill="none" stroke="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
        </svg>

      </a>
    </div>
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
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">

      </div>
    </section>

  </div>





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
      b.style.display = "block";
    }
  </script>




  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="javascript/chat.js"></script>
  <script src="javascript/users.js"></script>
  <script src="src/mini-event-calendar.min.js"></script>

  <script>
    var sameDaylastWeek = new Date().setDate(new Date().getDate() - 7);
    var someDaynextMonth = new Date().setDate(new Date().getDate() + 31);

    // All dates should be provided in timestamps
    var sampleEvents = [{
        title: "Soulful sundays bay area",
        date: sameDaylastWeek, // Same day as today, last week
        link: "https://www.eventbrite.com/e/soulful-sundays-bay-area-edition-tickets-55214242285?aff=ehomecard"
      },
      {
        title: "London Comicon",
        date: new Date().getTime(), // Today
        link: "https://www.eventbrite.co.uk/e/london-film-comic-con-summer-2019-tickets-49472593860?aff=ebdssbdestsearch"
      },
      {
        title: "Youth Athletic Camp",
        date: someDaynextMonth, // Some day as today, next month
        link: "https://www.eventbrite.com/e/leaner-stronger-faster-tm-youth-athletic-camp-2021-tickets-38245970728?aff=ebdssbdestsearch"
      }
    ];

    $(document).ready(function() {
      $("#calendar").MEC({
        events: sampleEvents
      });

      // Make calendar start on monday
      $("#calendar2").MEC({
        from_monday: true,
        events: sampleEvents
      });
    });




  </script>

</body>

</html>