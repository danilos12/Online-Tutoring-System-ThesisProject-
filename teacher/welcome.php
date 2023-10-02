<?php
include 'config.php';
include 'header.php';

    if (!isset($_SESSION['SESSION_EMAIL_TEACHER'])) {
        header("Location: ../login/index");
        die();
    }
$query12 = mysqli_query($conn, "SELECT * FROM enrolled WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query123 = mysqli_query($conn, "SELECT * FROM tut_reg WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query1234 = mysqli_query($conn, "SELECT * FROM tut_reg WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query12345 = mysqli_query($conn, "SELECT COUNT(*) as tt FROM lesson WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
$query123456 = mysqli_query($conn, "SELECT COUNT(*) as tt2 FROM enrolled WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
if (mysqli_num_rows($query12) > 0) {
    $row1 = mysqli_fetch_assoc($query12);
}
if (mysqli_num_rows($query1234) > 0) {
    $row12 = mysqli_fetch_assoc($query1234);
}
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
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="./output.css" rel="stylesheet">


      <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
</head>

<body class="bg-gray-100">






    <!--dropdown prof-->
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
        <!-- Loading screen -->






          <!--Enrolled Student-->


          <div class="relative  sm:rounded-lg w-full mt-12  px-40  grid grid-cols-1 gap-4">

          <div class=" p-6 w-full  ">
                  <div class="w-full flex shadow-md p-6">
                      <div class="w-1/2 block px-12">
                            <div class="">
                          <p class="text-6xl font-sans font-bold ">Welcome <?php echo $row['fname']?>!</p>
                          </div>
                          <div class="py-12 ">

                            <p>Welcome to your dashboard. In your dashboard, you will see the status of your:</p>
                            <p class="font-bold"> EARNINGS</p>
                            <p class="font-bold"> BALANCE</p>
                            <p class="font-bold"> SUBJECTS</p>
                            <p class="font-bold">ENROLLED STUDENTS</p>
                          </div>
                      </div>
                      <div class="w-1/2 h-38  flex justify-center ">
                  <img src="./images/welcome.png" width="350"  alt="">

                  </div>

                    </div>

                            <!-- Start -->
                        <div class="flex  justify-center space-x-5 w-full py-6">
                                  <div class=" h-40 max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow-md ">

                                      <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Total Earnings</h5>

                                      <p class="text-center text-2xl mb-3 font-medium text-gray-700 ">₱ <?php echo $row12['totalE'] ?></p>

                                  </div>

                                  <div class="h-40 max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow-md ">

                                      <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Current Earnings</h5>

                                      <p class="text-center text-2xl mb-3 font-medium text-gray-700 ">₱ <?php echo $row12['earnings'] ?></p>

                                  </div>
                                  <div class="h-40 max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow-md ">

                                      <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Total subjects</h5>

                                      <p class="text-center text-2xl mb-3 font-medium text-gray-700 "><?php echo $row123['tt'] ?></p>

                                  </div>
                                  <div class="h-40 max-w-xs p-6 bg-white border border-gray-200 rounded-lg shadow-md ">

                                      <h5 class="mb-8 text-2xl font-bold tracking-tight text-gray-900">Total enrolled student</h5>

                                      <p class="text-center text-2xl mb-3 font-medium text-gray-700 "><?php echo $row1234['tt2'] ?></p>

                                  </div>
                          </div>
                            <!-- End -->


          </div>

        </div>

        <div class=" cal h-full w-96 block p-3">
          <div id="wrapper">
            <div class="relative bottom-12 ">
              <div id="calendar"></div>

            </div>



          </div>

        </div>
          <!--END OF ENROLLED STUDENT-->







    </div>
    <div >
      <a href="#" id="heyss" onclick="myopen()" class=" fixed bottom-10 right-0 h-14 w-16 items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-200">
      <svg  class="w-10 h-10 text-black" fill="none" stroke="black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>

    </a></div>
  </div>


    <link rel="stylesheet" href="src/mini-event-calendar.min.css">
    <div class="wrapper">
    <section class="users" id="chat-area" style="display: none;">
      <header id="heads" class="heads" onclick="minimize()">
        <a href="#" class="back-icon"><img src="./photo/—Pngtree—vector back icon_4190818.png" alt="" class="heys"></a>
        <div class="content">
          <?php
          $sql = mysqli_query($conn, "SELECT * FROM allusers WHERE unique_id = {$_SESSION['SESSION_EMAIL_TEACHER']}");
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


      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="src/mini-event-calendar.min.js"></script>

      <script>
        var sameDaylastWeek = new Date().setDate(new Date().getDate() - 7);
        var someDaynextMonth = new Date().setDate(new Date().getDate() + 31);

        // All dates should be provided in timestamps
            var sampleEvents = [
          {
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

        $(document).ready(function(){
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
        function minimize(){
          var a = document.getElementById('chat-area');
          var b = document.getElementById('heyss');
          a.style.display = "none";
          b.style.display = "flex";
        }

    </script>
    <script src="javascript/chat.js"></script>
    <script src="javascript/users.js"></script>
	<style>
		html, body{
			margin: 0;
			padding: 0;
		}
		/* Just an excuse to use CSS Grid 😊 */
		#wrapper{
			padding: 1px;
			display: grid;
      scale: 0.8;
			grid-gap: 20px;

		}

		[id^=calendar],
		[id^=calendar] + h3{
			width: 400px;
		}

		[id^=calendar] + h3{
			text-align: center;
		}

		@media only screen and (max-width: 500px){
			#wrapper{
				padding: 1em;
				display: block;
			}
			[id^=calendar],
			[id^=calendar] + h3{
				width: 100%;
				max-width: 400px;
				margin: 1em auto;
			}

			[id^=calendar] + h3{
				display: block;
				margin-bottom: 2em;
			}
		}
	</style>

</body>

</html>