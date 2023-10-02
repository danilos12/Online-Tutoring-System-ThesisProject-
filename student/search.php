<?php
include 'config.php';
include 'headercopy.php';
$qry = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
$qry12 = mysqli_query($conn, "SELECT * FROM deposit WHERE unique_id = {$_SESSION['unique_id']}");

$qry55 = mysqli_query($conn, "SELECT DISTINCT hourlyrate FROM lesson");
if (mysqli_num_rows($qry) > 0) {
  $rowss = mysqli_fetch_assoc($qry);
}
if($qry55->num_rows> 0){
      $options= mysqli_fetch_all($qry55, MYSQLI_ASSOC);
      $options = array_unique($options, SORT_REGULAR);
      $im = $options['unique_id'];
    }
if (mysqli_num_rows($qry12) > 0) {
  $rowss21 = mysqli_fetch_assoc($qry12);
  
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search subject</title>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js" integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./style.css">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
</head>

<body>






  <!--dropdown prof-->
  <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
    <div class="flex  h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
      <!-- Loading screen -->




      <div class="flex  flex-col items-center justify-center flex-1 sm ">
        <div class="w-full flex justify-center lg:p-0 md:p-40">

          <div class="w-1/2 flex  lg:mr-9 md:mr-0  mb-4">

            <input id="keywords" onkeyup="searchFilter();" class="mr-2  placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-b-4 border-slate-300 rounded-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search Subjects Here" type="text" name="search" />
            
            
            <select class="form-control" id="filterBy" onchange="searchFilter();">
                
              <option value="">Filter by Hourly Rate</option>
              <?php
            foreach ($options as $option) {
            ?>
              <option value="<?php echo $option["hourlyrate"]; ?>">₱<?php echo $option["hourlyrate"]; ?></option>
              <?php
              }
            
            ?>
            </select>
            
            <script>
              function searchFilter(page_num) {
                page_num = page_num ? page_num : 0;
                var keywords = $('#keywords').val();
                var filterBy = $('#filterBy').val();
                $.ajax({
                  type: 'POST',
                  url: 'getData.php',
                  data: 'page=' + page_num + '&keywords=' + keywords + '&filterBy=' + filterBy,
                  beforeSend: function() {
    $('.loading-overlay').stop().fadeToggle("slow");
},
success: function(html) {
    $('#dataContainer').html(html);
    $('.loading-overlay').stop().fadeToggle("slow");
}
                });
              }
            </script>
          </div>

          <?php
          // Include pagination library file
          include_once 'Pagination.class.php';

          // Include database configuration file
          require_once 'dbConfig.php';

          // Set some useful configuration
          $baseURL = 'getData.php';
          $limit = 4;

          // Count of all records
          $query   = $db->query("SELECT COUNT(*) as rowNum FROM lesson
LEFT JOIN enrolled ON enrolled.subject = lesson.subj AND enrolled.unique_id_stud = {$_SESSION['unique_id']}
WHERE enrolled.subject IS NULL");
          $result  = $query->fetch_assoc();
          $rowCount = $result['rowNum'];

          // Initialize pagination class
          $pagConfig = array(
            'baseURL' => $baseURL,
            'totalRows' => $rowCount,
            'perPage' => $limit,
            'contentDiv' => 'dataContainer',
            'link_func' => 'searchFilter'
          );
          $pagination =  new Pagination($pagConfig);

          // Fetch records based on the limit
          
          $query = $db->query("SELECT lesson.*
FROM lesson
LEFT JOIN enrolled ON enrolled.subject = lesson.subj AND enrolled.unique_id_stud = {$_SESSION['unique_id']}
WHERE enrolled.subject IS NULL ORDER BY id DESC LIMIT $limit");
          ?>
          <!--strt cards-->
          
        </div>

        <div class="loading-overlay">

          <div id="dataContainer" class="relative grid mb-8 rounded-lg md:mb-12 md:grid-cols-2 gap-4">

            <?php
            if ($query->num_rows > 0) {
              $i = 0;
              while ($row12 = $query->fetch_assoc()) {
                $i++;
            ?>
                <form class="yatis" id="foo" method="POST">
                  <figure class="max-w-2xl px-8 py-4 bg-white rounded-lg shadow-md ">
                    <div class="flex items-center justify-between">
                      <?php
                      $query34 = mysqli_query($conn, "SELECT SUM(rate) as total_rate, COUNT(rate) as total_count FROM rating WHERE unique_id_tut = {$row12["unique_id"]}");
                      if (mysqli_num_rows($query34) > 0) {
    $row3y = mysqli_fetch_assoc($query34);
    
    $total_rate = $row3y['total_rate'];
    $total_count = $row3y['total_count'];
    if($total_count >0){
     $average_rating = $total_rate/$total_count;
    }else{
    $average_rating = 0; 
    }
} else {
    $average_rating = 0;
}
                      ?>
                      
                      <div class="flex items-center justify-between space-x-4">
    <span class="text-sm font-semibold text-black dark:text-black">Hourly Rate: ₱<?php echo $row12["hourlyrate"]; ?></span>
    <div class="flex items-center ml-2">
        <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        <p class="ml-2 text-sm font-bold text-gray-900 "><?php echo number_format($average_rating, 1); ?></p>
        <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full dark:bg-gray-400"></span>
        <a onclick="window.location.href='viewProf?id=<?php echo $row12['unique_id']; ?>'" class="text-sm font-medium text-gray-900 underline hover:no-underline cursor-pointer pr-4"><?php echo $total_count; ?> reviews</a>
    </div>
</div>
                      <input type="hidden" id="fileN" name="fileN" value="<?php echo $row12["filee"]; ?>">
                      <input type="hidden" id="roomID1" name="roomID1" value="<?php echo $row12["roomID"]; ?>">
                      <input type="hidden" id="unq" name="unq" value="<?php echo $row12["unique_id"]; ?>">
                      <input type="hidden" id="unqStud" name="unqStud" value="<?php echo $rowss["unique_id"]; ?>">
                      <input type="hidden" id="fnme" name="fnme" value="<?php echo $rowss["fname"]; ?>">
                      <input type="hidden" id="lnme" name="lnme" value="<?php echo $rowss["lname"]; ?>">
                      <input type="hidden" id="sub" name="sub" value="<?php echo $row12["subj"]; ?>">
                      <input class="fnm" type="hidden" id="tF" name="tF" value="<?php echo $row12["fname"]; ?>">
                      <input type="hidden" id="tL" name="tL" value="<?php echo $row12["lname"]; ?>">
                      <input type="hidden" id="hourly" class="hou" name="hourly" value="<?php echo $row12["hourlyrate"]; ?>">
                      
                      <input type="hidden" id="earn" name="earn" value="<?php echo $row12["earn"]; ?>">
                      <button type="submit" id="subm" name="submit" class="eut px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-300 transform bg-gray-600 rounded cursor-pointer hover:bg-gray-500 ">Enroll</button>
<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

            <div class="modal-content py-4 text-left px-6">

                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold">Enroll</p>
                    <div class="modal-close cursor-pointer z-50">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <form class="yatis" id="foo" method="POST">
                <p>Do you want to enroll?</p>
                </form>
                <!--adi ing unod-->
                <div class="flex justify-end pt-2">
                    <button id="yess"
                        class="huy px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-600">Yes</button>

                    <button
                        class="et modal-close  px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">No</button>
                </div>
            </div>
        </div>
    </div>
                    </div>

                    <div class="mt-2">
                      <p class="text-2xl font-bold text-black dark:text-black hover:text-black dark:hover:text-black "><?php echo $row12["subj"]; ?></p>
                      <p class="mt-2 text-black dark:text-black"><?php echo $row12["description"]; ?></p>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                      <a href="../files/<?php echo $row12["filee"]; ?>" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline"><?php echo $row12["filee"]; ?></a>

                      <div class="flex items-center">

                        <a onclick="window.location.href='viewProf?id=<?php echo $row12['unique_id']; ?>'" class="font-bold text-black cursor-pointer dark:text-black"><?php echo $row12["fname"]; ?></a>
                      </div>
                    </div>

                  </figure>

                </form>
                <input type="hidden" class="balbal" id="balbal" name="balbal" value="<?php echo $rowss21["balance"]; ?>">
            <?php
              }
            } else {
              echo 'No records found...';
            }
            ?>
            
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
            <?php echo $pagination->createLinks(); ?>
          </div>
        </div>

        <!--end cards-->



      </div>
      <!--right side bar-->

      <!--End of right side bar-->
    </div>


  </div>




  <script>
  var modal = document.querySelector(".modal");
        
       

        


        
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
    let formData;
    let hourly;
    let form1;
      $(".eut").click(function(e) {
       e.preventDefault();
       formData = new FormData($(this).closest('form')[0]);
    modal.classList.add("modal-open");
    form1 = this.closest("form");
    hourly = form1.querySelector(".hou").value;
    console.log(hourly);
      
    });
    
   $(document).ready(function() {
      $(".huy").click(function(e) {
           e.preventDefault();
           
        var btn = $(this);
        btn.prop("disabled", true);
        var balance = document.getElementById("balbal").value;
    
    if (balance < hourly) {
        console.log("balance is insuf");
        console.log(hourly);
        
        toastr.warning("Not enough balance to pay Hourly Rate", "Insufficient Balance", { progressBar: true , closeButton: true });
        btn.prop("disabled", false);
    }else{
        var url = "enroll.php";
        axios.post(url, formData, {
              headers: {
                'Content-Type': 'multipart/form-data'
              }
            })
            .then(function(res) {
                toastr.success("You have successfully enrolled <br><span class='my-font-size'>- you will be redirected to view subject after this notification</span><br>", "Success", { progressBar: true , closeButton: true , onHidden: function() {window.location.replace("./viewSub");}});
                btn.prop("disabled", false);
                
            })
            .catch(function(error) {
              toastr.error("Something's wrong", "Error", { progressBar: true , closeButton: true });
              btn.prop("disabled", false);
            })
            modal.classList.remove("modal-open");
            return false;
    }
        
      
        
       
})
      });
  </script>




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